<?php
namespace WeddingBundle\Repository;
use WeddingBundle\Entity\Dish;
use WeddingBundle\Entity\Menu;
use \Doctrine\ORM\Tools\Pagination\Paginator;

class WeddingRepository extends \Doctrine\ORM\EntityRepository {

	public function saveMenu($menu=null,$title=null,$type=null,$user=null, $wedding=null){
		$em=$this->getEntityManager();
		
		$dish_repo=$em->getRepository("WeddingBundle:Dish");
		
		if($wedding==null){
			$wedding=$this->findOneBy(array(
				"title"=>$title,
				"type"=>$type,
				"user"=>$user
			));
		}else{}
		
		//$tags.=",";
		$menu = explode(",", $menu);
		
		foreach($menu as $dish){
			$isset_dish = $dish_repo->findOneBy(array("name"=>trim($dish)));
			
			if(count($isset_dish)==0){
				$dish_obj = new Dish();
				$dish_obj->setName($dish);
				$dish_obj->setDescription($dish);
				
				if(!empty(trim($dish))){
					$em->persist($dish_obj);
					$em->flush();
				}
			}
			
			$dish = $dish_repo->findOneBy(array("name"=>$dish));
			
			$menu=new Menu();
			$menu->setWedding($wedding);
			$menu->setDish($dish);
			$em->persist($menu);
		}
		
		$flush=$em->flush();
		return $flush;
	}
	
}

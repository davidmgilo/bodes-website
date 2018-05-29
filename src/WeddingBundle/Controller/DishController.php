<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace WeddingBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WeddingBundle\Entity\Dish;
use WeddingBundle\Form\DishType;
use Symfony\Component\HttpFoundation\Session\Session;
/**
 * Description of DishController
 *
 * @author david
 */
class DishController extends Controller{
    private $session;
	
    public function __construct() {
	$this->session=new Session();
    }
    
    public function indexAction(){
		$em = $this->getDoctrine()->getEntityManager();
		$dish_repo=$em->getRepository("WeddingBundle:Dish");
		$dishes=$dish_repo->findAll();
                
		
		return $this->render("WeddingBundle:Dish:index.html.twig",array(
			"dishes" => $dishes
		));
	}
   
   public function addAction(Request $request){
		$dish = new Dish();
		$form = $this->createForm(DishType::class,$dish);
		
		$form->handleRequest($request);
		
		if($form->isSubmitted()){
			if($form->isValid()){
				
				$em = $this->getDoctrine()->getEntityManager();
				
				$dish = new Dish();
				$dish->setName($form->get("name")->getData());
				$dish->setDescription($form->get("description")->getData());
				
				$em->persist($dish);
				$flush = $em->flush();
				
				if($flush==null){
					$status = "Plat creat correctament";
				}else{
					$status ="Plat no afegit";
				}
				
			}else{
				$status = "Plat no afegit perquè el formulari no és vàlid";
			}
			
			$this->session->getFlashBag()->add("status", $status);
			return $this->redirectToRoute("wedding_index_dish");
		}
		
		
		return $this->render("WeddingBundle:Dish:add.html.twig",array(
			"form" => $form->createView()
		));
	}
        
    public function deleteAction($id){
		$em = $this->getDoctrine()->getEntityManager();
		$dish_repo=$em->getRepository("WeddingBundle:Dish");
		$dish=$dish_repo->find($id);
		
		if(count($dish->getMenu())==0){
			$em->remove($dish);
			$em->flush();
		}
		
		return $this->redirectToRoute("wedding_index_dish");
	}
    
    public function editAction(Request $request, $id){
		$em = $this->getDoctrine()->getEntityManager();
		$dish_repo=$em->getRepository("WeddingBundle:Dish");
		$dish=$dish_repo->find($id);
		
		$form = $this->createForm(DishType::class,$dish);
		
		$form->handleRequest($request);
		
		if($form->isSubmitted()){
			if($form->isValid()){
				
				$dish->setName($form->get("name")->getData());
				$dish->setDescription($form->get("description")->getData());
				
				$em->persist($dish);
				$flush = $em->flush();
				
				if($flush==null){
					$status = "El plat se ha editat correctamente";
				}else{
					$status ="Error al editar el plat";
				}
				
			}else{
				$status = "El plat no s'ha editat perquè el formulari no es vàlid";
			}
			
			$this->session->getFlashBag()->add("status", $status);
			return $this->redirectToRoute("wedding_index_dish");
		}
		
		return $this->render("WeddingBundle:Dish:edit.html.twig",array(
			"form" => $form->createView()
		));
	}
}

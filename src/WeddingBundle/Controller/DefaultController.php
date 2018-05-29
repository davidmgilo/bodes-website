<?php

namespace WeddingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
//        $em = $this->getDoctrine()->getEntityManager();
//        $entry_repo = $em->getRepository("WeddingBundle:Wedding");
//        $entries = $entry_repo->findAll();
//        
//        foreach($entries as $entry){
//            echo $entry->getTitle().'<br/>';
//            echo $entry->getType()->getName().'<br/>';
//            echo $entry->getUser()->getName().'<br/>';
//            $tags = $entry->getMenu();
//            foreach ($tags as $tag){
//                echo $tag->getDish()->getName().'<br/>';
//            }
//            
//            echo "<hr/>";
//        }
//        
//        die();
        
        return $this->render('WeddingBundle:Default:index.html.twig');
    }
}

<?php

namespace WeddingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TypeController extends Controller
{
    public function showAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
//        $type_repo=$em->getRepository("WeddingBundle:Type");
//        $types=$type_repo->findAll();
        $dql = "SELECT e FROM WeddingBundle:Type e";
        $query = $em->createQuery($dql);
                
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page',1),
            5
        );
        
        return $this->render('WeddingBundle:Type:show.html.twig', array(
//            'types'=> $types
            'pagination' => $pagination
        ));
    }

}

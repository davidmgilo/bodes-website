<?php

namespace WeddingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WeddingBundle\Form\UserType;
use WeddingBundle\Entity\User;
use Symfony\Component\HttpFoundation\Session\Session;

class UserController extends Controller
{
        private $session;
	
    public function __construct() {
	$this->session=new Session();
    }
    
    public function loginAction(Request $request)
    {
        $authenticationsUtils = $this->get("security.authentication_utils");
        $error = $authenticationsUtils->getLastAuthenticationError();
        $lastUsername = $authenticationsUtils->getLastUsername();
        
//        $user = new User();
//        $form = $this->createForm(UserType::class,$user);
//        $form->handleRequest($request);
//        if($form->isValid()){
//            $em=$this->getDoctrine()->getEntityManager();
//            $user_repo=$em->getRepository("WeddingBundle:User");
//            $user = $user_repo->findOneBy(array("email"=>$form->get("email")->getData()));
//            
//            if(count($user)==0){
//                $status= "Registre correcte";
//                $user = new User();
//                $user->setName($form->get("name")->getData());
//                $user->setSurname($form->get("surname")->getData());
//                $user->setEmail($form->get("email")->getData());
//
//                $factory = $this->get("security.encoder_factory");
//                $encoder = $factory->getEncoder($user);
//                $password = $encoder->encodePassword($form->get("password")->getData(), $user->getSalt());
//                $user->setPassword($password);
//
//
//                $user->setRole("ROLE_USER");
//
//                $em = $this->getDoctrine()->getEntityManager();
//                $em->persist($user);
//                $flush = $em->flush();
//
//                if($flush==null){
//                    $status = "Usuari creat correctament";
//                }else{
//                    $status = "Alguna cosa ha fallat. Torna-ho a intentar";
//                }
//                $this->session->getFlashBag()->add("status",$status);
//            }else{
//                $status = "Aquest usuari ja existeix";
//                $this->session->getFlashBag()->add("status",$status);
//            }
//        }else{
//            $status= "Registre incorrecte";
//        }  
        
        return $this->render('WeddingBundle:User:login.html.twig', array(
            "error" => $error,
            "lastUsername" => $lastUsername
        ));
    }
    
    public function registerAction(Request $request){
        $user = new User();
        $form = $this->createForm(UserType::class,$user);
        $form->handleRequest($request);
        if($form->isValid()){
            $em=$this->getDoctrine()->getEntityManager();
            $user_repo=$em->getRepository("WeddingBundle:User");
            $user = $user_repo->findOneBy(array("email"=>$form->get("email")->getData()));
            
            if(count($user)==0){
                $status= "Registre correcte";
                $user = new User();
                $user->setName($form->get("name")->getData());
                $user->setSurname($form->get("surname")->getData());
                $user->setEmail($form->get("email")->getData());

                $factory = $this->get("security.encoder_factory");
                $encoder = $factory->getEncoder($user);
                $password = $encoder->encodePassword($form->get("password")->getData(), $user->getSalt());
                $user->setPassword($password);


                $user->setRole("ROLE_USER");

                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($user);
                $flush = $em->flush();

                if($flush==null){
                    $status = "Usuari creat correctament";
                    return $this->redirect('login');
                }else{
                    $status = "Alguna cosa ha fallat. Torna-ho a intentar";
                }
                $this->session->getFlashBag()->add("status",$status);
            }else{
                $status = "Aquest usuari ja existeix";
                $this->session->getFlashBag()->add("status",$status);
            }
        }else{
            $status= "Registre incorrecte";
        } 
        
        return $this->render('WeddingBundle:User:register.html.twig',array(
            "form" => $form->createView()
        ));
    }
}


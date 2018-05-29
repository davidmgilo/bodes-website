<?php

namespace WeddingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class WeddingType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class, array("label"=>"Titol:","required"=>"false", "attr" =>array(
				"class" => "form-name form-control",
			)))
            ->add('description',TextareaType::class, array("label"=>"Descripció:","required"=>"false", "attr" =>array(
				"class" => "form-name form-control",
			)))
            ->add('numPeople',NumberType::class, array("label"=>"Número de persones:","required"=>"false", "attr" =>array(
				"class" => "form-name form-control",
			)))
            ->add('price',NumberType::class, array("label"=>"Preu:","required"=>"false", "attr" =>array(
				"class" => "form-name form-control",
			)))
                        ->add('type', EntityType::class,array(
				"class" => "WeddingBundle:Type",
				"label" => "Tipus:",
				"attr" =>array("class" => "form-control")
			))
			->add('menu', TextType::class,array(
				"mapped" => false,
				"label" => "Menu:",
				"attr" =>array("class" => "form-control")
			))
			->add('Guardar', SubmitType::class, array("attr" =>array(
				"class" => "form-submit btn btn-success",
			)))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WeddingBundle\Entity\Wedding'
        ));
    }
}

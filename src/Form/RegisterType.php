<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label'=> 'Votre prenom',
                'attr' =>[
                    'placeholder' => 'Merci de saisir votre prenom'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label'=> 'Votre nom',
                'attr' => [
                    'placeholder' => 'Merci de saisir votre nom'    
                ]
            ])
            ->add('email', EmailType::class,[
                'label'=> 'Votre email',
                'attr' => [
                    'placeholder' => 'Merci de saisir votre mail'    
                ]
            ])
            ->add('password', RepeatedType::class,[
                'type' => PasswordType::class,
                'invalid_message' => 'Le mot de passe et la comfirmation doivent être idéntiques',
                'label'=> 'Votre mot de passe',
                'required' => true,
                'first_options' => [
                     'label' => 'votre mot de passe',
                     'attr' => [
                        'placeholder' => 'Merci de saisir votre mot de passe'    
                    ]
                ],
                'second_options' => [
                    'label' => 'Comfirmez votre mot de passe',
                    'attr' => [
                        'placeholder' => 'Merci de comfirmer votre mot de passe'    
                    ]
               ]
            ])
                      
            ->add('submit', SubmitType::class, 
                ['label' => "S'inscrire"]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

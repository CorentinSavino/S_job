<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use App\Form\AddressType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class,[
                'label'=>'prénom',
                'attr'=>[
                    'class'=>'form_field',
                    'placeholder'=>'Jean'
                ]
            ])
            
            ->add('lastname', TextType::class,[
                'label'=>'nom',
                'attr'=>[
                    'class'=>'form_field',
                    'placeholder'=>'Martin'
                ]
            ])
            
            ->add('email', EmailType::class,[
                'label'=>'email',
                'attr'=>[
                    'class'=>'form_field',
                    'placeholder'=>'j.martin@gmail.com'
                ]
            ])
            
            ->add('password', PasswordType::class,[
                'label'=>'mot de passe',
                'attr'=>[
                    'class'=>'form_field',
                ]
            ])
            
            ->add('phone_number')
            
            ->add('role', HiddenType::class,[
                'attr'=>[
                    'value'=>'User'
                ]
            ])

            // ->add('address', CollectionType::class, array(
            //     'entry_type'=>AddressType::class,
            //         'allow_add'    => true,
            //         'allow_delete' => true,
            //     'entry_options'=>['label'=>false],
            // ))

            ->add('valider', SubmitType::class, [
                'label'=>'S\'inscire',
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

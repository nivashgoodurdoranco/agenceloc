<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pseudo', TextType::class, [
                'label' => 'Pseudo',
                'constraints' => new Length([
                    'min' => 3,
                    'minMessage' => 'Le Pseudo doit contenir au moins {{ limit }} caractères',
                    'max' => 20,
                    'maxMessage' => 'Le Pseudo doit contenir au maximum {{ limit }} caractères'
                ]),
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe',
                'constraints' => new Length([
                    'min' => 5,
                    'minMessage' => 'Le mot de passe doit contenir au moins {{ limit }} caractères',
                    'max' => 60,
                    'maxMessage' => 'Le mot de passe doit contenir au maximum {{ limit }} caractères'
                ]),
            ])
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'constraints' => new Length([
                    'min' => 5,
                    'minMessage' => 'Le nom doit contenir au moins {{ limit }} caractères',
                    'max' => 20,
                    'maxMessage' => 'Le nom doit contenir au maximum {{ limit }} caractères'
                ]),
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'constraints' => new Length([
                    'min' => 5,
                    'minMessage' => 'Le Prénom doit contenir au moins {{ limit }} caractères',
                    'max' => 20,
                    'maxMessage' => 'Le Prénom doit contenir au maximum {{ limit }} caractères'
                ]),
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'constraints' => new Length([
                    'min' => 5,
                    'minMessage' => 'L\' email doit contenir au moins {{ limit }} caractères',
                    'max' => 50,
                    'maxMessage' => 'L\'email doit contenir au maximum {{ limit }} caractères'
                ]),
            ])
            ->add('civilite', ChoiceType::class, [
                'choices' => [
                    'm' => 'm',
                    'f' => 'f',
                ],
                ])

                ->add('submit', SubmitType::class , [
                    'label' => "S'inscrire"
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

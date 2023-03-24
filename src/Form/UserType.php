<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('password')
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Rôle utilisateur' => 'ROLE_USER',
                    'Rôle administrateur' =>'ROLE_ADMIN',
                ],
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('createdAt', DateType::class, [
                'widget' => 'single_text',
                'input'  => 'datetime_immutable'
            ])
            ->add('updatedAt', DateType::class, [
                'widget' => 'single_text',
                'input'  => 'datetime_immutable'
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Modifier',
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

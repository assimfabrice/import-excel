<?php

namespace App\Form;

use App\Entity\ProductSearchEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProductSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'required' => false,
                'attr'     => [
                    'placeholder' => 'Rechercher',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProductSearchEntity::class,
            'method' => 'get',
            'csrf_protection' => false,
        ]);
    }
    public function getBlockPrefix()
    {
        return '';
    }
}

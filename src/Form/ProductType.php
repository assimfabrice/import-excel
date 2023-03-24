<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('price')
            ->add('imageFile', FileType::class, [
                'required' => false,
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
                'label' => 'Ajouter produit',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}

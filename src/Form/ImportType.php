<?php

namespace App\Form;

use App\Entity\Datas;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ImportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('import', FileType::class, [
                'label'       => 'Import (Excel file)',
                'mapped'      => false,
                'required'    => true,
                'constraints' => [
                    new File([                        
                        'mimeTypes' => [
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        ],
                        'mimeTypesMessage' => 'Veuilez insérer un document Excel valide',
                    ]) 
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Importer',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Datas::class,
        ]);
    }
}

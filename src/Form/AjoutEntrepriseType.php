<?php

namespace App\Form;

use App\Entity\Entreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\File;

class AjoutEntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_entreprise', TextType::class)
            ->add('description_entreprise', TextareaType::class)
            ->add('banniere_entreprise', FileType::class, array(
                'mapped' => false,
                'label' => 'Fichier à télécharger',
                'constraints' => [
                    new File([
                        'maxSize' => '500k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Le site accepte uniquement les PNG et JPG',
                    ])
                ],
            ))
            ->add('logo_entreprise', FileType::class, array(
                'mapped' => false,
                'label' => 'Fichier à télécharger',
                'constraints' => [
                    new File([
                        'maxSize' => '500k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Le site accepte uniquement les fichiers PNG et JPG',
                    ])
                ],
            ))
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}

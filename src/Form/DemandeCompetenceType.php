<?php

namespace App\Form;

use App\Entity\Rechercher;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


use App\Entity\Competence;


class DemandeCompetenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('salaire')
            ->add('niveau_demande')
            ->add('competence',EntityType::class, [
                'class' => Competence::class,
                'choice_label' => 'libelle',
            ])
            ->add('envoyer', SubmitType::class)

            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Rechercher::class,
        ]);
    }
}

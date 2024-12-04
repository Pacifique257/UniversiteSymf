<?php

namespace App\Form;

use App\Entity\Etudiant;
use App\Entity\Classe; // Assurez-vous d'importer l'entité Classe
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; // Importer EntityType

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('matricule')
            ->add('nom')
            ->add('prenom')
            ->add('ddn', DateType::class, [
                'widget' => 'choice',
                'years' => range(date('Y') - 100, date('Y')),
                'format' => 'yyyy-MM-dd'
            ])
            ->add('genre')
            ->add('noteexetat')
          ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
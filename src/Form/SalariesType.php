<?php

namespace App\Form;

use App\Entity\Salaries;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SalariesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
                ->add('prenom')
                ->add('nom')
                ->add('telephone')
                ->add('email')
                ->add('adresse')
                ->add('poste')
                ->add('salaire')
                ->add('datedenaissance');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Salaries::class,
        ]);
    }
}

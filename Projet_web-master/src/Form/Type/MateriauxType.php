<?php

namespace Projet_web\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MateriauxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text')
            ->add('type', 'text')
            ->add('unite', 'number')
            ->add('prixHT', 'number');
    }

    public function getName()
    {
        return 'user';
    }

}

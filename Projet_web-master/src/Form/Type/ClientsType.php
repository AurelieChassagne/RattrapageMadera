<?php

namespace Projet_web\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ClientsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text')
            ->add('prenom', 'text')
            ->add('mail', 'text')
            ->add('telephone', 'text')
            ->add('adresse', 'text')
            ->add('codePostal', 'text')
            ->add('ville', 'text');
    }

    public function getName()
    {
        return 'user';
    }

}
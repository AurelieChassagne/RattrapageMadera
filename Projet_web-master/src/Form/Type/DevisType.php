<?php

namespace Projet_web\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class DevisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomDevis', 'text')
            ->add('adresseDevis', 'text')
            ->add('codePostalDevis', 'text')
            ->add('villeDevis', 'text')            
            ->add('mailDevis', 'text')
            ->add('nomClient', 'text')
            ->add('prenomClient', 'text')
            ->add('adresseClient', 'text')
            ->add('codePostalClient', 'text')
            ->add('villeClient', 'text')
            ->add('nomMateriaux', 'text')
            ->add('uniteMateriaux', 'text')
            ->add('prixMateriaux', 'text')
            ->add('totalHTDevis', 'number')
            ->add('TVADevis', 'number')
            ->add('totalTTCDevis', 'number');
    }

    public function getName()
    {
        return 'user';
    }

}
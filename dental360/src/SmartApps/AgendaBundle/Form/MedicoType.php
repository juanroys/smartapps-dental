<?php

namespace SmartApps\AgendaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MedicoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreCompleto')
            ->add('titulosEspecialidad')
            ->add('file')
        ;
        /*$builder
            ->add('nombreCompleto')
            ->add('titulosEspecialidad')
            ->add('pathFirma', 'file', array( 'required' => false))
        ; */
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SmartApps\AgendaBundle\Entity\Medico'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'smartapps_agendabundle_medico';
    }
}

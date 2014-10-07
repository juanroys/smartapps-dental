<?php

namespace SmartApps\AgendaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TarifaMedicoProcType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipoTarifa')
            ->add('valor')
            ->add('procedimiento')
            ->add('medico')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SmartApps\AgendaBundle\Entity\TarifaMedicoProc'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'smartapps_agendabundle_tarifamedicoproc';
    }
}

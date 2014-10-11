<?php

namespace SmartApps\AgendaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DisponibilidadType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('diasSemena')
            ->add('fechaDesde')
            ->add('fechaHasta')
            ->add('horaInicio')
            ->add('horaFin')
            ->add('medico')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SmartApps\AgendaBundle\Entity\Disponibilidad'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'smartapps_agendabundle_disponibilidad';
    }
}

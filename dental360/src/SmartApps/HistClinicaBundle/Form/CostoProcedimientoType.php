<?php

namespace SmartApps\HistClinicaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CostoProcedimientoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('valor')
            ->add('procedimiento')
            ->add('convenio')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SmartApps\HistClinicaBundle\Entity\CostoProcedimiento'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'smartapps_histclinicabundle_costoprocedimiento';
    }
}

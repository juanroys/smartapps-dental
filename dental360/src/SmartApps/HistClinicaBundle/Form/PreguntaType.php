<?php

namespace SmartApps\HistClinicaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PreguntaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('enunciado')
            ->add('obligatoria','checkbox',array('required'=>false))
            ->add('orden')
            ->add('filaCompleta','checkbox',array('required'=>false))
            ->add('noColumna')
            ->add('estaActiva','checkbox',array('required'=>false))
            ->add('tipoPregunta')
            ->add('grupo')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SmartApps\HistClinicaBundle\Entity\Pregunta'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'smartapps_histclinicabundle_pregunta';
    }
}

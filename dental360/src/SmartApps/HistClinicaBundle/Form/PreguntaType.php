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
            ->add('tipoEntrada', 'choice', array(
                    'choices' => \SmartApps\HistClinicaBundle\Util\Util::TipoPreguntaEnum(),
                    'attr' => array('style' => 'width:300px'),
                ))
            ->add('enunciado')
            ->add('obligatoria', 'choice', array(
                    'choices' => \SmartApps\HistClinicaBundle\Util\Util::SiNoEnum(),
                    'attr' => array('style' => 'width:300px'),
                ))
            ->add('orden')
            ->add('colspan')
            ->add('rowspan')
            ->add('noColumna')
            ->add('estaActiva', 'choice', array(
                    'choices' => \SmartApps\HistClinicaBundle\Util\Util::SiNoEnum(),
                    'attr' => array('style' => 'width:300px'),
                ))
            ->add('opciones', 'text', array('required' => false))
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

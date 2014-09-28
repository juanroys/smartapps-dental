<?php

namespace SmartApps\HistClinicaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TipoPreguntaType extends AbstractType
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
            ->add('descripcion')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SmartApps\HistClinicaBundle\Entity\TipoPregunta'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'smartapps_histclinicabundle_tipopregunta';
    }
}

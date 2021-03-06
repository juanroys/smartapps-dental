<?php

namespace SmartApps\HistClinicaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PacienteType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
                ->add('apellido1')
                ->add('apellido2')
                ->add('nombres')
                ->add('fechaNacimiento', 'birthday')
                ->add('lugarNacimiento')
                ->add('tipoIdentificacion', 'choice', array(
                    'empty_value' => '',
                    'choices' => \SmartApps\HistClinicaBundle\Util\Util::TipoIdentificacionEnum(),
                    'attr' => array('style' => 'width:300px'),
                ))
                ->add('noIdentificacion')
                ->add('email', 'email')
                ->add('estadoCivil', 'choice', array(
                    'empty_value' => '',
                    'choices' => \SmartApps\HistClinicaBundle\Util\Util::EstadoCivilEnum(),
                    'attr' => array('style' => 'width:300px'),
                ))
                ->add('sexo', 'choice', array(
                    'empty_value' => '',
                    'choices' => \SmartApps\HistClinicaBundle\Util\Util::GeneroEnum(),
                    'attr' => array('style' => 'width:300px'),
                ))
                ->add('ocupacion')
                ->add('empresa')
                ->add('cargo')
                ->add('ePS')
                ->add('cotizanteBeneficiario', 'choice', array(
                    'empty_value' => '',
                    'choices' => \SmartApps\HistClinicaBundle\Util\Util::TipoAfiliacionEnum(),
                    'attr' => array('style' => 'width:300px'),
                ))
                ->add('responNombreCompleto')
                ->add('responNoIdentificacion')
                ->add('responParentesco')
                ->add('residenciaMunicipio')
                ->add('residenciaDepartamento')
                ->add('residenciaDireccion')
                ->add('residenciaTelefono')
                ->add('trabajoMunicipio')
                ->add('trabajoDepartamento')
                ->add('trabajoDireccion')
                ->add('trabajoTelefono')
                ->add('responUbicacionDepartamento')
                ->add('responUbicacionMunicipio')
                ->add('responUbicacionDireccion')
                ->add('responUbicacionTelefono')
                ->add('convenio')
                ->add('activo', 'hidden', array('data' => 1,))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'SmartApps\HistClinicaBundle\Entity\Paciente'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'smartapps_histclinicabundle_paciente';
    }

}

<?php

namespace SmartApps\HistClinicaBundle\Twig\Extension;

class UtilidadesExtension extends \Twig_Extension {

    public function getName() {
        return 'age';
    }

    public function getFilters() {
        return array(
            'age' => new \Twig_Filter_Method($this, 'getAge'),
        );
    }

    public function getAge($date) {
        $referenceDate = date('01-01-Y');
        $referenceDateTimeObject = new \DateTime($referenceDate);
        $diff = $referenceDateTimeObject->diff($date);
        return $diff->y;
    }

}

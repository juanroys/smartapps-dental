<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DiagnosticoDiente
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class DiagnosticoDiente
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="diagnosticoDienteId", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SmartApps\HistClinicaBundle\Entity\HistoriaClinica")
     * @ORM\JoinColumn(name="historiaClinicaId",referencedColumnName="historiaClinicaId")
     */
    private $historiaClinica;

    /**
     * @ORM\ManyToOne(targetEntity="SmartApps\HistClinicaBundle\Entity\ItemOdontograma")
     * @ORM\JoinColumn(name="itemOdontogramaId",referencedColumnName="itemOdontogramaId")
     */
    private $itemOdontograma;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipoDiagnostico", type="integer")
     */
    private $tipoDiagnostico;

    /**
     * @var integer
     *
     * @ORM\Column(name="ubicacion", type="integer")
     */
    private $ubicacion;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function setHistoriaClinica(\SmartApps\HistClinicaBundle\Entity\HistoriaClinica $historiaClinica)
    {
        $this->historiaClinica = $historiaClinica;

        return $this;
    }

    
    public function getHistoriaClinica()
    {
        return $this->historiaClinica;
    }

    
    public function setItemOdontograma(\SmartApps\HistClinicaBundle\Entity\ItemOdontograma $itemOdontograma)
    {
        $this->itemOdontograma = $itemOdontograma;

        return $this;
    }

    public function getItemOdontograma()
    {
        return $this->itemOdontograma;
    }

    /**
     * Set tipoDiagnostico
     *
     * @param integer $tipoDiagnostico
     * @return DiagnosticoDiente
     */
    public function setTipoDiagnostico($tipoDiagnostico)
    {
        $this->tipoDiagnostico = $tipoDiagnostico;

        return $this;
    }

    /**
     * Get tipoDiagnostico
     *
     * @return integer 
     */
    public function getTipoDiagnostico()
    {
        return $this->tipoDiagnostico;
    }

    /**
     * Set ubicacion
     *
     * @param integer $ubicacion
     * @return DiagnosticoDiente
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return integer 
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }
}

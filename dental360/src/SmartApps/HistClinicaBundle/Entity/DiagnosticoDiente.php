<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DiagnosticoDiente
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SmartApps\HistClinicaBundle\Entity\DiagnosticoDienteRepository")
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
     * @ORM\JoinColumn(name="historiaClinicaId",referencedColumnName="historiaClinicaId", onDelete="RESTRICT")
     */
    private $historiaClinica;

    /**
     * @ORM\ManyToOne(targetEntity="SmartApps\HistClinicaBundle\Entity\ItemOdontograma")
     * @ORM\JoinColumn(name="itemOdontogramaId",referencedColumnName="itemOdontogramaId", onDelete="RESTRICT")
     */
    private $itemOdontograma;

    /**
     * @var integer
     *
      * @ORM\Column(name="tipoDiagnostico", type="string", length=124)
     */
    private $tipoDiagnostico;
    
    /**
     * @var integer
     *
      * @ORM\Column(name="tipoIcono", type="string", length=124)
     */
    private $tipoIcono;
    
    /**
     * @var integer
     *
      * @ORM\Column(name="icono", type="string", length=124)
     */
    private $icono;

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
     * @param string $tipoDiagnostico
     * @return DiagnosticoDiente
     */
    public function setTipoDiagnostico($tipoDiagnostico)
    {
        $this->tipoDiagnostico = $tipoDiagnostico;

        return $this;
    }

    /**
     * Get tipoIcono
     *
     * @return string 
     */
    public function getTipoDiagnostico()
    {
        return $this->tipoDiagnostico;
    }
    /**
     * Set tipoDiagnostico
     *
     * @param string $tipoIcono
     * @return DiagnosticoDiente
     */
    public function setTipoIcono($tipoIcono)
    {
        $this->tipoIcono = $tipoIcono;

        return $this;
    }

    /**
     * Get icono
     *
     * @return string 
     */
    public function getTipoIcono()
    {
        return $this->tipoIcono;
    }
    /**
     * Set tipoDiagnostico
     *
     * @param string $icono
     * @return DiagnosticoDiente
     */
    public function setIcono($icono)
    {
        $this->icono = $icono;

        return $this;
    }

    /**
     * Get tipoDiagnostico
     *
     * @return string 
     */
    public function getIcono()
    {
        return $this->icono;
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

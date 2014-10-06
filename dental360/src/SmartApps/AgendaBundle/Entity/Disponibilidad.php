<?php

namespace SmartApps\AgendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medico
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SmartApps\AgendaBundle\Entity\DisponibilidadRepository")
 */
class Disponibilidad
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="disponibilidadId", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
   
    /**
     * @ORM\ManyToOne(targetEntity="SmartApps\AgendaBundle\Entity\Medico")
     * @ORM\JoinColumn(name="medicoId",referencedColumnName="medicoId")
     */
    private $medico;
    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="diasSemena", type="integer")
     */
    private $diasSemena;
 
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaDesde", type="datetime")
     */
    private $fechaDesde;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaHasta", type="datetime")
     */
    private $fechaHasta;
 
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horaInicio", type="datetime")
     */
    private $horaInicio;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horaFin", type="datetime")
     */
    private $horaFin;
    

    public function __construct() {
        
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function setMedico(SmartApps\AgendaBundle\Entity\Medico $medico)
    {
        $this->medico = $medico;
        return $this;
    }
    
    public function getMedico()
    {
        return $this->medico;
    }
        
    /**
     * Set diasSemana
     *
     * @param integer $diasSemana
     * @return Disponibilidad
     */
    public function setDiasSemana($diasSemana)
    {
        $this->diasSemena = $diasSemana;
        return $this;
    }

    /**
     * Get diasSemana
     *
     * @return integer 
     */
    public function getDiasSemana()
    {
        return $this->diasSemena;
    }
    
    /**
     * Set fechaDesde
     *
     * @param \DateTime $fechaDesde
     * @return Disponibilidad
     */
    public function setFechaDesde($fechaDesde)
    {
        $this->fechaDesde = $fechaDesde;
        return $this;
    }

    /**
     * Get fechaDesde
     *
     * @return \DateTime 
     */
    public function getFechaDesde()
    {
        return $this->fechaDesde;
    }
    
    /**
     * Set fechaHasta
     *
     * @param \DateTime $fechaHasta
     * @return Disponibilidad
     */
    public function setFechaHasta($fechaHasta)
    {
        $this->fechaHasta = $fechaHasta;
        return $this;
    }

    /**
     * Get fechaHasta
     *
     * @return \DateTime 
     */
    public function getFechaHasta()
    {
        return $this->fechaHasta;
    }
    
    /**
     * Set horaInicio
     *
     * @param \DateTime $fechaDesde
     * @return Disponibilidad
     */
    public function setHoraInicio($horaInicio)
    {
        $this->horaInicio = $horaInicio;
        return $this;
    }

    /**
     * Get horaInicio
     *
     * @return \DateTime 
     */
    public function getHoraInicio()
    {
        return $this->horaInicio;
    }
    
    /**
     * Set horaFin
     *
     * @param \DateTime $horaFin
     * @return Disponibilidad
     */
    public function setHoraFin($horaFin)
    {
        $this->horaFin = $horaFin;
        return $this;
    }

    /**
     * Get horaFin
     *
     * @return \DateTime 
     */
    public function getHoraFin()
    {
        return $this->horaFin;
    }
    
    
    
    public function __toString() {
        return $this->nombreCompleto;
    }
}

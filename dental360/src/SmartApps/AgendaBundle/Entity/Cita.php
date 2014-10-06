<?php

namespace SmartApps\AgendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medico
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SmartApps\AgendaBundle\Entity\CitaRepository")
 */
class Cita
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="citaId", type="bigint")
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
     * @ORM\ManyToOne(targetEntity="SmartApps\AgendaBundle\Entity\UnidadAtencion")
     * @ORM\JoinColumn(name="unidadAtencionId",referencedColumnName="unidadAtencionId")
     */
    private $unidadAtencion;
    
    /**
     * @ORM\ManyToOne(targetEntity="SmartApps\HistClinicaBundle\Entity\Paciente")
     * @ORM\JoinColumn(name="pacienteId",referencedColumnName="pacienteId")
     */
    private $paciente;
   
     /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaHora", type="datetime")
     */
    private $fechaHora;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="duracion", type="integer")
     */
    private $duracion;
 
    /**
     * @var integer
     *
     * @ORM\Column(name="estado", type="integer")
     */
    private $estado;
    
 

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
    /* ***************** MEDICO ********************************* */ 
    public function setMedico(SmartApps\AgendaBundle\Entity\Medico $medico)
    {
        $this->medico = $medico;
        return $this;
    }
    
    public function getMedico()
    {
        return $this->medico;
    }
    /* *************** UNIDAD ATENCION *********************************** */     
    public function setUnidadAtencion(SmartApps\AgendaBundle\Entity\UnidadAtencion $unidadAtencion)
    {
        $this->unidadAtencion = $unidadAtencion;
        return $this;
    }
    
    public function getUnidadAtencion()
    {
        return $this->unidadAtencion;
    }
    /* ************** PACIENTE ************************************ */ 
    public function setPaciente(SmartApps\AgendaBundle\Entity\Paciente $paciente)
    {
        $this->paciente = $paciente;
        return $this;
    }
    
    public function getPaciente()
    {
        return $this->paciente;
    }
    
    /**
     * Set fechaHora
     *
     * @param \DateTime $fechaHora
     * @return Cita
     */
    public function setFechaHora($fechaHora)
    {
        $this->fechaHora = $fechaHora;
        return $this;
    }

    /**
     * Get fechaHora
     *
     * @return \DateTime 
     */
    public function getFechaHora()
    {
        return $this->fechaHora;
    }
    
    /**
     * Set duracion
     *
     * @param integer $duracion
     * @return Cita
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
        return $this;
    }

    /**
     * Get duracion
     *
     * @return integer 
     */
    public function getDuracion()
    {
        return $this->duracion;
    }
    
    /**
     * Set estado
     *
     * @param integer $estado
     * @return Cita
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
        return $this;
    }

    /**
     * Get estado
     *
     * @return integer 
     */
    public function getEstado()
    {
        return $this->estado;
    }
    
    public function __toString() {
        return $this->nombreCompleto;
    }
}

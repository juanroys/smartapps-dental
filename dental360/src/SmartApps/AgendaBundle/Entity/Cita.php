<?php

namespace SmartApps\AgendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cita
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
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;
    
    /**
     * @var horainicio
     *
     * @ORM\Column(name="horainicio", type="datetime")
     */
    private $horainicio;
    
    /**
     * @var horafin
     *
     * @ORM\Column(name="horafin", type="datetime")
     */
    private $horafin;
 
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
    public function setMedico(\SmartApps\AgendaBundle\Entity\Medico $medico)
    {
        $this->medico = $medico;
        return $this;
    }
    
    public function getMedico()
    {
        return $this->medico;
    }
    /* *************** UNIDAD ATENCION *********************************** */     
    public function setUnidadAtencion(\SmartApps\AgendaBundle\Entity\UnidadAtencion $unidadAtencion)
    {
        $this->unidadAtencion = $unidadAtencion;
        return $this;
    }
    
    public function getUnidadAtencion()
    {
        return $this->unidadAtencion;
    }
    /* ************** PACIENTE ************************************ */ 
    public function setPaciente(\SmartApps\HistClinicaBundle\Entity\Paciente $paciente)
    {
        $this->paciente = $paciente;
        return $this;
    }
    
    public function getPaciente()
    {
        return $this->paciente;
    }
    
    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Cita
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }
    
    /**
     * Set horainicio
     *
     * @param \DateTime $horainicio
     * @return Cita
     */
    public function setHoraInicio($horainicio)
    {
        $this->horainicio = $horainicio;
        return $this;
    }

    /**
     * Get horainicio
     *
     * @return \DateTime 
     */
    public function getHoraInicio()
    {
        return $this->horainicio;
    }
    
     /**
     * Set horafin
     *
     * @param \DateTime $horafin
     * @return Cita
     */
    public function setHoraFin($horafin)
    {
        $this->horafin = $horafin;
        return $this;
    }

    /**
     * Get horafin
     *
     * @return \DateTime 
     */
    public function getHoraFin()
    {
        return $this->horafin;
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
        return $this->fechaHora->format('Y-m-d');
    }
}

<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Atencion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SmartApps\HistClinicaBundle\Entity\AtencionRepository")
 */
class Atencion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="atencionId", type="bigint")
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
     * @ORM\ManyToOne(targetEntity="SmartApps\AgendaBundle\Entity\Medico")
     * @ORM\JoinColumn(name="medicoId",referencedColumnName="medicoId")
     */
    private $medico;

    /**
     * @ORM\ManyToOne(targetEntity="SmartApps\AgendaBundle\Entity\Cita")
     * @ORM\JoinColumn(name="citaId",referencedColumnName="citaId")
     */
    private $cita;
    
    /**
     * @ORM\OneToMany(targetEntity="Tratamiento", mappedBy="atencion")
     */
    private $tratamientos;
    /**
     * @ORM\OneToOne(targetEntity="SmartApps\ContableBundle\Entity\Recibo", inversedBy="atencion")
     */
    private $recibo;

    /**
     * @var string
     *
     * @ORM\Column(name="fechaHora" , type="datetime")
     */
    private $fechaHora;

    /**
     * @var integer
     *
     * @ORM\Column(name="abono", type="bigint")
     */
    private $abono;

    /**
     * @var integer
     *
     * @ORM\Column(name="saldo", type="bigint")
     */
    private $saldo;

    /**
     * @var integer
     *
     * @ORM\Column(name="costoTotal", type="bigint")
     */
    private $costoTotal;

    /**
     * @var string
     *
     * @ORM\Column(name="firmaPaciente", type="string", length=255)
     */
    private $firmaPaciente;


    public function __construct() {
        $this->tratamientos=new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Set historiaClinica
     *
     * @param string $historiaClinica
     * @return Atencion
     */
    public function setHistoriaClinica(\SmartApps\HistClinicaBundle\Entity\HistoriaClinica $historiaClinica)
    {
        $this->historiaClinica = $historiaClinica;

        return $this;
    }

    /**
     * Get historiaClinica
     *
     * @return string 
     */
    public function getHistoriaClinica()
    {
        return $this->historiaClinica;
    }

    /**
     * Set medico
     *
     * @param string $medico
     * @return Atencion
     */
    public function setMedico(\SmartApps\AgendaBundle\Entity\Medico $medico)
    {
        $this->medico = $medico;

        return $this;
    }

    /**
     * Get medico
     *
     * @return string 
     */
    public function getMedico()
    {
        return $this->medico;
    }

    /**
     * Set cita
     *
     * @param string $cita
     * @return Atencion
     */
    public function setCita(\SmartApps\AgendaBundle\Entity\Cita $cita)
    {
        $this->cita = $cita;

        return $this;
    }

    /**
     * Get cita
     *
     * @return string 
     */
    public function getCita()
    {
        return $this->cita;
    }
    
    public function setRecibo(\SmartApps\ContableBundle\Entity\Recibo $recibo){
        $this->recibo=$recibo;
        return $this;
    }
    
    public function getRecibo(){
        return $this->recibo;
    }

    /**
     * Set fechaHora
     *
     * @param string $fechaHora
     * @return Atencion
     */
    public function setFechaHora($fechaHora)
    {
        $this->fechaHora = $fechaHora;

        return $this;
    }

    /**
     * Get fechaHora
     *
     * @return string 
     */
    public function getFechaHora()
    {
        return $this->fechaHora;
    }

    /**
     * Set abono
     *
     * @param integer $abono
     * @return Atencion
     */
    public function setAbono($abono)
    {
        $this->abono = $abono;

        return $this;
    }

    /**
     * Get abono
     *
     * @return integer 
     */
    public function getAbono()
    {
        return $this->abono;
    }

    /**
     * Set saldo
     *
     * @param integer $saldo
     * @return Atencion
     */
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;

        return $this;
    }

    /**
     * Get saldo
     *
     * @return integer 
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * Set costoTotal
     *
     * @param integer $costoTotal
     * @return Atencion
     */
    public function setCostoTotal($costoTotal)
    {
        $this->costoTotal = $costoTotal;

        return $this;
    }

    /**
     * Get costoTotal
     *
     * @return integer 
     */
    public function getCostoTotal()
    {
        return $this->costoTotal;
    }

    /**
     * Set firmaPaciente
     *
     * @param string $firmaPaciente
     * @return Atencion
     */
    public function setFirmaPaciente($firmaPaciente)
    {
        $this->firmaPaciente = $firmaPaciente;

        return $this;
    }

    /**
     * Get firmaPaciente
     *
     * @return string 
     */
    public function getFirmaPaciente()
    {
        return $this->firmaPaciente;
    }
    
    public function getTratamientos(){
        return $this->tratamientos;
    }
}

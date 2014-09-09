<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tratamiento
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Tratamiento
{
    
    /**
     * @ORM\Column(name="tratamientoId", type="bigint")
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
     * @ORM\ManyToOne(targetEntity="SmartApps\HistClinicaBundle\Entity\Procedimiento")
     * @ORM\JoinColumn(name="procedimientoId",referencedColumnName="procedimientoId")
     */
    private $procedimiento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaHora", type="datetime")
     */
    private $fechaHora;

    /**
     * @var string
     *
     * @ORM\Column(name="diente", type="string", length=10)
     */
    private $diente;

    /**
     * @var integer
     *
     * @ORM\Column(name="costoProcedimiento", type="bigint")
     */
    private $costoProcedimiento;

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
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;


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
     * @return Tratamiento
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
     * Set procedimiento
     *
     * @param string $procedimiento
     * @return Tratamiento
     */
    public function setProcedimiento(\SmartApps\HistClinicaBundle\Entity\Procedimiento $procedimiento)
    {
        $this->procedimiento = $procedimiento;

        return $this;
    }

    /**
     * Get procedimiento
     *
     * @return string 
     */
    public function getProcedimiento()
    {
        return $this->procedimiento;
    }

    /**
     * Set fechaHora
     *
     * @param \DateTime $fechaHora
     * @return Tratamiento
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
     * Set diente
     *
     * @param string $diente
     * @return Tratamiento
     */
    public function setDiente($diente)
    {
        $this->diente = $diente;

        return $this;
    }

    /**
     * Get diente
     *
     * @return string 
     */
    public function getDiente()
    {
        return $this->diente;
    }

    /**
     * Set costoProcedimiento
     *
     * @param integer $costoProcedimiento
     * @return Tratamiento
     */
    public function setCostoProcedimiento($costoProcedimiento)
    {
        $this->costoProcedimiento = $costoProcedimiento;

        return $this;
    }

    /**
     * Get costoProcedimiento
     *
     * @return integer 
     */
    public function getCostoProcedimiento()
    {
        return $this->costoProcedimiento;
    }

    /**
     * Set abono
     *
     * @param integer $abono
     * @return Tratamiento
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
     * @return Tratamiento
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Tratamiento
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
}

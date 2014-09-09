<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sugerencia
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Sugerencia
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="sugerenciaId", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SmartApps\HistClinicaBundle\Entity\Procedimiento")
     * @ORM\JoinColumn(name="procedimientoId",referencedColumnName="procedimientoId")
     */
    private $procedimiento;

    /**
     * @ORM\ManyToOne(targetEntity="SmartApps\HistClinicaBundle\Entity\HistoriaClinica")
     * @ORM\JoinColumn(name="historiaClinicaId",referencedColumnName="historiaClinicaId")
     */
    private $historiaClinica;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaPlanificacion", type="datetime")
     */
    private $fechaPlanificacion;


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
     * Set procedimiento
     *
     * @param string $procedimiento
     * @return Sugerencia
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
     * Set historiaClinica
     *
     * @param string $historiaClinica
     * @return Sugerencia
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
     * Set fechaPlanificacion
     *
     * @param \DateTime $fechaPlanificacion
     * @return Sugerencia
     */
    public function setFechaPlanificacion($fechaPlanificacion)
    {
        $this->fechaPlanificacion = $fechaPlanificacion;

        return $this;
    }

    /**
     * Get fechaPlanificacion
     *
     * @return \DateTime 
     */
    public function getFechaPlanificacion()
    {
        return $this->fechaPlanificacion;
    }
}

<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tratamiento
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Tratamiento {

    /**
     * @ORM\Column(name="tratamientoId", type="bigint")
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
     * @ORM\ManyToOne(targetEntity="SmartApps\HistClinicaBundle\Entity\Atencion", inversedBy="tratamientos")
     * @ORM\JoinColumn(name="atencionId",referencedColumnName="atencionId")
     */
    private $atencion;

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
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set procedimiento
     *
     * @param string $procedimiento
     * @return Tratamiento
     */
    public function setProcedimiento(\SmartApps\HistClinicaBundle\Entity\Procedimiento $procedimiento) {
        $this->procedimiento = $procedimiento;

        return $this;
    }

    /**
     * Get procedimiento
     *
     * @return string 
     */
    public function getProcedimiento() {
        return $this->procedimiento;
    }

    /**
     * Set diente
     *
     * @param string $diente
     * @return Tratamiento
     */
    public function setDiente($diente) {
        $this->diente = $diente;

        return $this;
    }

    /**
     * Get diente
     *
     * @return string 
     */
    public function getDiente() {
        return $this->diente;
    }

    /**
     * Set costoProcedimiento
     *
     * @param integer $costoProcedimiento
     * @return Tratamiento
     */
    public function setCostoProcedimiento($costoProcedimiento) {
        $this->costoProcedimiento = $costoProcedimiento;

        return $this;
    }

    /**
     * Get costoProcedimiento
     *
     * @return integer 
     */
    public function getCostoProcedimiento() {
        return $this->costoProcedimiento;
    }

    public function setAtencion(\SmartApps\HistClinicaBundle\Entity\Atencion $atencion) {
        $this->atencion = $atencion;
        return $this;
    }

    public function getAtencion() {
        return $this->atencion;
    }

}

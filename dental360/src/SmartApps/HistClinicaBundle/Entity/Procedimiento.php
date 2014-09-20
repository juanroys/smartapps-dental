<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Procedimiento
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SmartApps\HistClinicaBundle\Entity\ProcedimientoRepository")
 */
class Procedimiento
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="procedimientoId", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
     /**
     * @ORM\OneToMany(targetEntity="SmartApps\HistClinicaBundle\Entity\CostoProcedimiento", mappedBy="procedimiento")
     */
    private $costoProcedimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    public function __construct() {
        $this->costoProcedimiento=new \Doctrine\Common\Collections\ArrayCollection();
        $this->convenios=new \Doctrine\Common\Collections\ArrayCollection();
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

    public function setCostoProcedimiento(\Doctrine\Common\Collections\ArrayCollection $costoProcedimiento){
        $this->costoProcedimiento=$costoProcedimiento;
        return $this;
    }
    
    public function getCostoProcedimiento(){
        return $this->costoProcedimiento;
    }
    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Procedimiento
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
    
    public function __toString() {
        return $this->descripcion;
    }
}

<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
    private $costosProcedimientos;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     *  @Assert\NotBlank(message = "Por favor, escribe una descripción")
     */
    private $descripcion;
    
    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=255)
     *  @Assert\NotBlank(message = "Por favor, escribe un código")
     */
    private $codigo;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean",nullable=false,options={"default":0})
     */
    private $activo;

    public function __construct() {
        $this->costosProcedimientos=new \Doctrine\Common\Collections\ArrayCollection();
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

    public function setCostosProcedimientos(\Doctrine\Common\Collections\ArrayCollection $costosProcedimientos){
        $this->costoProcedimiento=$costosProcedimientos;
        return $this;
    }
    
    public function getCostosProcedimientos(){
        return $this->costosProcedimientos;
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
    
    /**
     * Set codigo
     *
     * @param string $codigo
     * @return Procedimiento
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }
    
    /**
     * Set activo
     *
     * @param boolean activo
     * @return Procedimiento
     */
    public function setActivo($activo) {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean 
     */
    public function getActivo() {
        return $this->activo;
    }
    
    public function __toString() {
        return $this->descripcion;
    }
    
    public function descripcioncompleta()
    {
        return $this->codigo . ' - ' . $this->descripcion;
    }
}

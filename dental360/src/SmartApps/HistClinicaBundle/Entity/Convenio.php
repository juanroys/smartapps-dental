<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Convenio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SmartApps\HistClinicaBundle\Entity\ConvenioRepository")
 */
class Convenio
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="convenioId", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\OneToMany(targetEntity="SmartApps\HistClinicaBundle\Entity\CostoProcedimiento", mappedBy="convenio")
     */
    private $costosProcedimientos;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreConvenio", type="string", length=56)
     * @Assert\NotBlank(message = "Por favor, escribe un nombre")
     */
    private $nombreConvenio;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean",nullable=false,options={"default":0})
     * @Assert\NotBlank(message = "Por favor, selecciona una opción")
     */
    private $activo;

    public function __construct() {
        $this->costosProcedimientos= new \Doctrine\Common\Collections\ArrayCollection();
        $this->Procedimientos= new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombreConvenio
     *
     * @param string $nombreConvenio
     * @return Convenio
     */
    public function setNombreConvenio($nombreConvenio)
    {
        $this->nombreConvenio = $nombreConvenio;

        return $this;
    }

    /**
     * Get nombreConvenio
     *
     * @return string 
     */
    public function getNombreConvenio()
    {
        return $this->nombreConvenio;
    }
    
    public function setCostosProcedimientos(\Doctrine\Common\Collections\ArrayCollection $costosProcedimientos){
        $this->costosProcedimientos=$costosProcedimientos;
        return $this;
    }
    
    public function getCostosProcedimientos(){
        return $this->costosProcedimientos;
    }
    
    /**
     * Set activo
     *
     * @param boolean activo
     * @return Convenio
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
        return $this->nombreConvenio;
    }
}

<?php

namespace SmartApps\AgendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medico
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SmartApps\AgendaBundle\Entity\UnidadAtencionRepository")
 */
class UnidadAtencion
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="unidadAtencionId", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=256)
     */
    private $descripcion;
    
      

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

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return UnidadAtencion
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
        return $this->nombreCompleto;
    }
}

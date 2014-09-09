<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoPregunta
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TipoPregunta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="tipoPreguntaId", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     *
     * @ORM\OneToMany(targetEntity="OpcionRespuesta", mappedBy="tipoPregunta")
     */
    private $opcionesRespuesta;
    
     public function __construct() {
        $this->opcionesRespuesta=new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return TipoPregunta
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

    public function getOpcionesRespuesta(){
        return $this->opcionesRespuesta;
    }
    
    
    public function __toString() {
        return $this->descripcion;
    }
}

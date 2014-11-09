<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @var integer
     *
     * @ORM\Column(name="tipoEntrada", type="integer") 
     *  @Assert\NotBlank(message = "Por favor, selecciona un tipo de entrada")
     * @Assert\NotEqualTo(value=0, message = "Por favor, selecciona un tipo de entrada")
     */
    private $tipoEntrada;
    
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     *  @Assert\NotBlank(message = "Por favor, escribe una descripción")
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
    
    /**
     * Set orden
     *
     * @param integer $tipoEntrada
     * @return Pregunta
     */
    public function setTipoEntrada($tipoEntrada)
    {
        $this->tipoEntrada = $tipoEntrada;

        return $this;
    }

    /**
     * Get orden
     *
     * @return integer 
     */
    public function getTipoEntrada()
    {
        return $this->tipoEntrada;
    }
}

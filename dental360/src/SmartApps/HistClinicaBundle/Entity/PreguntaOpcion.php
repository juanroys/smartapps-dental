<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * OpcionRespuesta
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SmartApps\HistClinicaBundle\Entity\PreguntaOpcionRepository")
 */
class PreguntaOpcion
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="opcRtaId", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SmartApps\HistClinicaBundle\Entity\Pregunta", inversedBy="preguntaOpciones")
     * @ORM\JoinColumn(name="preguntaId",referencedColumnName="preguntaId",onDelete="CASCADE")
     */
    private $pregunta;

    /**
     * @var integer
     *
     * @ORM\Column(name="orden", type="integer")
     *  @Assert\NotBlank(message = "Por favor, escribe un orden")
     * @Assert\Type(type="integer")
     */
    private $orden;

    /**
     * @var string
     *
     * @ORM\Column(name="valorTexto", type="string", length=2048, nullable=true)
     */
    private $valorTexto;

    /**
     * @var string
     *
     * @ORM\Column(name="valorNumero", type="decimal", nullable=true)
     */
    private $valorNumero;

    /**
     * @var string
     *
     * @ORM\Column(name="opciones", type="string", length=512, nullable=true,options={"default":""})
     */
    private $opciones;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enunciado", type="string", length=2048, nullable=true)
     */
    private $enunciado;

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

    
    public function setPregunta(\SmartApps\HistClinicaBundle\Entity\Pregunta $pregunta)
    {
        $this->pregunta = $pregunta;

        return $this;
    }

    public function getPregunta()
    {
        return $this->pregunta;
    }

    /**
     * Set orden
     *
     * @param integer $orden
     * @return OpcionRespuesta
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * Get orden
     *
     * @return integer 
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * Set valorTexto
     *
     * @param string $valorTexto
     * @return OpcionRespuesta
     */
    public function setValorTexto($valorTexto)
    {
        $this->valorTexto = $valorTexto;

        return $this;
    }

    /**
     * Get valorTexto
     *
     * @return string 
     */
    public function getValorTexto()
    {
        return $this->valorTexto;
    }

    /**
     * Set valorNumero
     *
     * @param string $valorNumero
     * @return OpcionRespuesta
     */
    public function setValorNumero($valorNumero)
    {
        $this->valorNumero = $valorNumero;

        return $this;
    }

    /**
     * Get valorNumero
     *
     * @return string 
     */
    public function getValorNumero()
    {
        return $this->valorNumero;
    }
    
    /**
     * Set opciones
     *
     * @param string $opciones
     * @return Pregunta
     */
    public function setOpciones($opciones)
    {
        $this->opciones = $opciones;

        return $this;
    }

    /**
     * Get opciones
     *
     * @return string 
     */
    public function getOpciones()
    {
        return $this->opciones;
    }
    
    /**
     * Set enunciado
     *
     * @param string $enunciado
     * @return OpcionRespuesta
     */
    public function setEnunciado($enunciado)
    {
        $this->enunciado = $enunciado;

        return $this;
    }
 
    /**
     * Get enunciado
     *
     * @return string 
     */
    public function getEnunciado()
    {
        return $this->enunciado;
    }
}

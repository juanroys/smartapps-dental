<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pregunta
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SmartApps\HistClinicaBundle\Entity\PreguntaRepository")
 */
class Pregunta
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="preguntaId", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SmartApps\HistClinicaBundle\Entity\Grupo", inversedBy="preguntas")
     * @ORM\JoinColumn(name="grupoId",referencedColumnName="grupoId")
     */
    private $grupo;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="tipoEntrada", type="integer")
     */
    private $tipoEntrada;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enunciado", type="string", length=1024, nullable=false,options={"default":""})
     */
    private $enunciado;

    /**
     * @var boolean
     *
     * @ORM\Column(name="obligatoria", type="boolean", nullable=false,options={"default":0})
     */
    private $obligatoria;

    /**
     * @var integer
     *
     * @ORM\Column(name="orden", type="integer")
     */
    private $orden;

    /**
     * @var integer
     *
     * @ORM\Column(name="colspan", type="integer",nullable=false,options={"default":1})
     */
    private $colspan;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="rowspan", type="integer",nullable=false,options={"default":1})
     */
    private $rowspan;

    /**
     * @var integer
     *
     * @ORM\Column(name="noColumna", type="integer",nullable=false,options={"default":1})
     */
    private $noColumna;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estaActiva", type="boolean",nullable=false,options={"default":0})
     */
    private $estaActiva;
    
    /**
     * @var string
     *
     * @ORM\Column(name="opciones", type="string", length=512, nullable=true,options={"default":""})
     */
    private $opciones;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="PreguntaOpcion", mappedBy="pregunta")
     */
    private $preguntaOpciones;

    public function __construct() {
        $this->preguntaOpciones=new \Doctrine\Common\Collections\ArrayCollection();
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
    
    public function setGrupo(\SmartApps\HistClinicaBundle\Entity\Grupo $grupo)
    {
        $this->grupo = $grupo;

        return $this;
    }

    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * Set enunciado
     *
     * @param string $enunciado
     * @return Pregunta
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

    /**
     * Set obligatoria
     *
     * @param boolean $obligatoria
     * @return Pregunta
     */
    public function setObligatoria($obligatoria)
    {
        $this->obligatoria = $obligatoria;

        return $this;
    }

    /**
     * Get obligatoria
     *
     * @return boolean 
     */
    public function getObligatoria()
    {
        return $this->obligatoria;
    }

    /**
     * Set orden
     *
     * @param integer $orden
     * @return Pregunta
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
     * Set colspan
     *
     * @param integer $colspan
     * @return Pregunta
     */
    public function setColspan($colspan)
    {
        $this->colspan = $colspan;

        return $this;
    }

    /**
     * Get colspan
     *
     * @return integer 
     */
    public function getColspan()
    {
        return $this->colspan;
    }
    
    /**
     * Set rowspan
     *
     * @param integer $rowspan
     * @return Pregunta
     */
    public function setRowspan($rowspan)
    {
        $this->rowspan = $rowspan;

        return $this;
    }

    /**
     * Get rowspan
     *
     * @return boolean 
     */
    public function getRowspan()
    {
        return $this->rowspan;
    }

    /**
     * Set noColumna
     *
     * @param integer $noColumna
     * @return Pregunta
     */
    public function setNoColumna($noColumna)
    {
        $this->noColumna = $noColumna;

        return $this;
    }

    /**
     * Get noColumna
     *
     * @return integer 
     */
    public function getNoColumna()
    {
        return $this->noColumna;
    }

    /**
     * Set estaActiva
     *
     * @param boolean $estaActiva
     * @return Pregunta
     */
    public function setEstaActiva($estaActiva)
    {
        $this->estaActiva = $estaActiva;

        return $this;
    }

    /**
     * Get estaActiva
     *
     * @return boolean 
     */
    public function getEstaActiva()
    {
        return $this->estaActiva;
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
    
     public function getPreguntaOpciones(){
        return $this->preguntaOpciones;
    }
    
    
    public function __toString() {
        return $this->enunciado;
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

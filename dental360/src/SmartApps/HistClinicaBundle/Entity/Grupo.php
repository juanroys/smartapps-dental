<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Grupo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SmartApps\HistClinicaBundle\Entity\GrupoRepository")
 */
class Grupo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="grupoId", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\OneToMany(targetEntity="Pregunta", mappedBy="grupo")
     */
    private $preguntas;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=124)
     * @Assert\NotBlank(message = "Por favor, escribe un titulo")
     */
    private $titulo;

    /**
     * @var integer
     *
     * @ORM\Column(name="orden", type="integer")
     * @Assert\NotBlank(message = "Por favor, escribe un orden")
     * @Assert\Type(type="integer")
     */
    private $orden;

    public function __construct() {
        $this->preguntas=new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get grupoId
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function getPreguntas(){
        return $this->preguntas;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     * @return Grupo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set orden
     *
     * @param integer $orden
     * @return Grupo
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
    
    public function __toString() {
        return $this->titulo;
    }
}

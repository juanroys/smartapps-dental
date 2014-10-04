<?php

namespace SmartApps\AgendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medico
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SmartApps\AgendaBundle\Entity\MedicoRepository")
 */
class Medico
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="medicoId", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nombreCompleto", type="string", length=256)
     */
    private $nombreCompleto;
    
    /**
     * @var string
     *
     * @ORM\Column(name="titulosEspecialidad", type="string", length=1024)
     */
    private $titulosEspecialidad;
    
    /**
     * @var string
     *
     * @ORM\Column(name="pathFirma", type="string", length=1024)
     */
    private $pathFirma;
    

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
     * Set nombreCompleto
     *
     * @param string $nombreCompleto
     * @return Medico
     */
    public function setNombreCompleto($nombreCompleto)
    {
        $this->nombreCompleto = $nombreCompleto;
        return $this;
    }

    /**
     * Get nombreCompleto
     *
     * @return string 
     */
    public function getNombreCompleto()
    {
        return $this->nombreCompleto;
    }
     
    /**
     * Set titulosEspecialidad
     *
     * @param string $titulosEspecialidad
     * @return Medico
     */
    public function setTitulosEspecialidad($titulosEspecialidad)
    {
        $this->titulosEspecialidad = $titulosEspecialidad;
        return $this;
    }

    /**
     * Get titulosEspecialidad
     *
     * @return string 
     */
    public function getTitulosEspecialidad()
    {
        return $this->titulosEspecialidad;
    }
    
    /**
     * Set pathFirma
     *
     * @param string $pathFirma
     * @return Medico
     */
    public function setPathFirma($pathFirma)
    {
        $this->pathFirma = $pathFirma;
        return $this;
    }

    /**
     * Get pathFirma
     *
     * @return string 
     */
    public function getPathFirma()
    {
        return $this->pathFirma;
    }
    
    public function __toString() {
        return $this->nombreCompleto;
    }
}

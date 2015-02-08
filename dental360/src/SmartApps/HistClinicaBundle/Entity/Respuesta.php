<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Respuesta
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SmartApps\HistClinicaBundle\Entity\RespuestaRepository")
 */
class Respuesta
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="respuestaId", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SmartApps\HistClinicaBundle\Entity\Pregunta")
     * @ORM\JoinColumn(name="preguntaId",referencedColumnName="preguntaId", onDelete="RESTRICT")
     */
    private $pregunta;

    /**
     * @ORM\ManyToOne(targetEntity="SmartApps\HistClinicaBundle\Entity\HistoriaClinica")
     * @ORM\JoinColumn(name="historiaClinicaId",referencedColumnName="historiaClinicaId", onDelete="RESTRICT")
     */
    private $historiaClinica;

    /**
     * @var string
     *
     * @ORM\Column(name="respuestaTexto", type="string", length=2048)
     */
    private $respuestaTexto;

    /**
     * @var string
     *
     * @ORM\Column(name="respuestaNumerica", type="decimal", nullable=true)
     */
    private $respuestaNumerica;


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

    public function setHistoriaClinica(\SmartApps\HistClinicaBundle\Entity\HistoriaClinica $historiaClinica)
    {
        $this->historiaClinica = $historiaClinica;

        return $this;
    }

    public function getHistoriaClinica()
    {
        return $this->historiaClinica;
    }

    /**
     * Set respuestaTexto
     *
     * @param string $respuestaTexto
     * @return Respuesta
     */
    public function setRespuestaTexto($respuestaTexto)
    {
        $this->respuestaTexto = $respuestaTexto;

        return $this;
    }

    /**
     * Get respuestaTexto
     *
     * @return string 
     */
    public function getRespuestaTexto()
    {
        return $this->respuestaTexto;
    }

    /**
     * Set respuestaNumerica
     *
     * @param string $respuestaNumerica
     * @return Respuesta
     */
    public function setRespuestaNumerica($respuestaNumerica)
    {
        $this->respuestaNumerica = $respuestaNumerica;

        return $this;
    }

    /**
     * Get respuestaNumerica
     *
     * @return string 
     */
    public function getRespuestaNumerica()
    {
        return $this->respuestaNumerica;
    }
}

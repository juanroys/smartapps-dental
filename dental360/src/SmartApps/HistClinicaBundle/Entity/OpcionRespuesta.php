<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OpcionRespuesta
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class OpcionRespuesta
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
     * @ORM\ManyToOne(targetEntity="SmartApps\HistClinicaBundle\Entity\TipoPregunta", inversedBy="opcionesRespuesta")
     * @ORM\JoinColumn(name="tipoPreguntaId",referencedColumnName="tipoPreguntaId")
     */
    private $tipoPregunta;

    /**
     * @var integer
     *
     * @ORM\Column(name="orden", type="integer")
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    
    public function setTipoPregunta(\SmartApps\HistClinicaBundle\Entity\TipoPregunta $pregunta)
    {
        $this->tipoPregunta = $pregunta;

        return $this;
    }

    public function getTipoPregunta()
    {
        return $this->tipoPregunta;
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
}

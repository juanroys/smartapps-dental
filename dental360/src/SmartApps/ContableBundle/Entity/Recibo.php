<?php

namespace SmartApps\ContableBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recibo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SmartApps\ContableBundle\Entity\ReciboRepository")
 */
class Recibo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\OneToOne(targetEntity="SmartApps\HistClinicaBundle\Entity\Atencion", mappedBy="recibo", cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    private $atencion;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=31)
     */
    private $numero;

    /**
     * @var integer
     *
     * @ORM\Column(name="abono", type="bigint")
     */
    private $abono;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function setAtencion(\SmartApps\HistClinicaBundle\Entity\Atencion $atencion){
        $this->atencion=$atencion;
        return $this;
    }
    
    public function getAtencion(){
        return $this->atencion;
    }
    /**
     * Set numero
     *
     * @param string $numero
     * @return Recibo
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set abono
     *
     * @param integer $abono
     * @return Recibo
     */
    public function setAbono($abono)
    {
        $this->abono = $abono;

        return $this;
    }

    /**
     * Get abono
     *
     * @return integer 
     */
    public function getAbono()
    {
        return $this->abono;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Recibo
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }
}

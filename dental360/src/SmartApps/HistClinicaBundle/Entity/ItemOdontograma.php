<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ItemOdontograma
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SmartApps\HistClinicaBundle\Entity\ItemOdontogramaRepository")
 */
class ItemOdontograma
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="itemOdontogramaId", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SmartApps\HistClinicaBundle\Entity\Odontograma")
     * @ORM\JoinColumn(name="odontogramaId",referencedColumnName="odontogramaId")
     */
    private $odontograma;

    /**
     * @var integer
     *
     * @ORM\Column(name="noCuadrante", type="integer")
     */
    private $noCuadrante;

    /**
     * @var integer
     *
     * @ORM\Column(name="noDiente", type="integer")
     */
    private $noDiente;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="noFila", type="integer")
     */
    private $noFila;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function setOdontograma(\SmartApps\HistClinicaBundle\Entity\Odontograma $odontograma)
    {
        $this->odontograma = $odontograma;

        return $this;
    }

    public function getOdontograma()
    {
        return $this->odontograma;
    }

    /**
     * Set noCuadrante
     *
     * @param integer $noCuadrante
     * @return ItemOdontograma
     */
    public function setNoCuadrante($noCuadrante)
    {
        $this->noCuadrante = $noCuadrante;

        return $this;
    }

    /**
     * Get noCuadrante
     *
     * @return integer 
     */
    public function getNoCuadrante()
    {
        return $this->noCuadrante;
    }

    /**
     * Set noDiente
     *
     * @param integer $noDiente
     * @return ItemOdontograma
     */
    public function setNoDiente($noDiente)
    {
        $this->noDiente = $noDiente;

        return $this;
    }

    /**
     * Get noFila
     *
     * @return integer 
     */
    public function getNoFila()
    {
        return $this->noFila;
    }
    /**
     * Set noDiente
     *
     * @param integer $noFila
     * @return ItemOdontograma
     */
    public function setNoFila($noFila)
    {
        $this->noFila = $noFila;

        return $this;
    }

    /**
     * Get noDiente
     *
     * @return integer 
     */
    public function getNoDiente()
    {
        return $this->noDiente;
    }
}

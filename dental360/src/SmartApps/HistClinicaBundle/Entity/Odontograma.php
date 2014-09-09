<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Odontograma
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Odontograma
{
   
    /**
     * @var integer
     *
     * @ORM\Column(name="odontogramaId", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SmartApps\HistClinicaBundle\Entity\Grupo")
     * @ORM\JoinColumn(name="grupoId",referencedColumnName="grupoId")
     */
    private $grupo;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;


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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Odontograma
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
}

<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Convenio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SmartApps\HistClinicaBundle\Entity\ConvenioRepository")
 */
class Convenio
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="convenioId", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreConvenio", type="string", length=56)
     */
    private $nombreConvenio;


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
     * Set nombreConvenio
     *
     * @param string $nombreConvenio
     * @return Convenio
     */
    public function setNombreConvenio($nombreConvenio)
    {
        $this->nombreConvenio = $nombreConvenio;

        return $this;
    }

    /**
     * Get nombreConvenio
     *
     * @return string 
     */
    public function getNombreConvenio()
    {
        return $this->nombreConvenio;
    }
    
    public function __toString() {
        return $this->nombreConvenio;
    }
}

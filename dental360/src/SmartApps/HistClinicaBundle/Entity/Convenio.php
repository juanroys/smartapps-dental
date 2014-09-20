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
     * @ORM\OneToMany(targetEntity="SmartApps\HistClinicaBundle\Entity\CostoProcedimiento", mappedBy="convenio")
     */
    private $costoProcedimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreConvenio", type="string", length=56)
     */
    private $nombreConvenio;

    public function __construct() {
        $this->costoProcedimiento= new \Doctrine\Common\Collections\ArrayCollection();
        $this->Procedimientos= new \Doctrine\Common\Collections\ArrayCollection();
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
    
    public function setCostoProcedimiento(\Doctrine\Common\Collections\ArrayCollection $costoProcedimiento){
        $this->costoProcedimiento=$costoProcedimiento;
        return $this;
    }
    
    public function getCostoProcedimiento(){
        return $this->costoProcedimiento;
    }
    
    public function setProcedimientos(\Doctrine\Common\Collections\ArrayCollection $procedimientos){
        $this->procedimientos=$procedimientos;
        return $this;
    }
    
    public function getProcedimientos(){
        return $this->procedimientos;
    }
    
    public function __toString() {
        return $this->nombreConvenio;
    }
}

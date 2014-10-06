<?php

namespace SmartApps\AgendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medico
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SmartApps\AgendaBundle\Entity\TarifaMedicoProcRepository")
 */
class TarifaMedicoProc
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="tarifaMedicoProcId", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
   
    /**
     * @ORM\ManyToOne(targetEntity="SmartApps\HistClinicaBundle\Entity\Procedimiento")
     * @ORM\JoinColumn(name="procedimientoId",referencedColumnName="procedimientoId")
     */
    private $procedimiento;
    
    /**
     * @ORM\ManyToOne(targetEntity="SmartApps\AgendaBundle\Entity\Medico")
     * @ORM\JoinColumn(name="medicoId",referencedColumnName="medicoId")
     */
    private $medico;
    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="tipoTarifa", type="integer")
     */
    private $tipoTarifa;
 
    /**
     * @var integer
     *
     * @ORM\Column(name="valor", type="bigint")
     */
    private $valor;
    
 

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

    public function setProcedimiento(\SmartApps\HistClinicaBundle\Entity\Procedimiento $procedimiento)
    {
        $this->procedimiento = $procedimiento;
        return $this;
    }
    
    public function getProcedimiento()
    {
        return $this->procedimiento;
    }
    
    public function setMedico(SmartApps\AgendaBundle\Entity\Medico $medico)
    {
        $this->medico = $medico;
        return $this;
    }
    
    public function getMedico()
    {
        return $this->medico;
    }
    
    
    /**
     * Set tipoTarifa
     *
     * @param integer $tipoTarifa
     * @return TarifaMedicoProc
     */
    public function setTipoTarifa($tipoTarifa)
    {
        $this->tipoTarifa = $tipoTarifa;
        return $this;
    }

    /**
     * Get tipoTarifa
     *
     * @return integer 
     */
    public function getTipoTarifa()
    {
        return $this->tipoTarifa;
    }
    
    /**
     * Set valor
     *
     * @param integer $valor
     * @return TarifaMedicoProc
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    /**
     * Get valor
     *
     * @return integer 
     */
    public function getValor()
    {
        return $this->valor;
    }
    
    
    public function __toString() {
        return $this->nombreCompleto;
    }
}

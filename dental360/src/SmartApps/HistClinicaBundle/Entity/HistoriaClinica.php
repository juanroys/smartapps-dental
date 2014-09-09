<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HistoriaClinica
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SmartApps\HistClinicaBundle\Entity\HistoriaClinicaRepository")
 */
class HistoriaClinica
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="historiaClinicaId", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SmartApps\HistClinicaBundle\Entity\Paciente")
     * @ORM\JoinColumn(name="pacienteId",referencedColumnName="pacienteId")
     */
    private $paciente;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId(){
        return $this->id;
    }
    
    public function setPaciente(\SmartApps\HistClinicaBundle\Entity\Paciente $paciente)
    {
        $this->paciente = $paciente;

        return $this;
    }
    
    public function getPaciente()
    {
        return $this->paciente;
    }
}

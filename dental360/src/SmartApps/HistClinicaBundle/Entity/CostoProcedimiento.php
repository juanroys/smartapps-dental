<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CostoProcedimiento
 *
 * @ORM\Table() 
 * @ORM\Entity(repositoryClass="SmartApps\HistClinicaBundle\Entity\CostoProcedimientoRepository")
 */
class CostoProcedimiento
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="costoProcedimientoId", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SmartApps\HistClinicaBundle\Entity\Procedimiento", inversedBy="costoProcedimiento")
     * @ORM\JoinColumn(name="procedimientoId",referencedColumnName="procedimientoId")
     */
    private $procedimiento;

    /**
     * @ORM\ManyToOne(targetEntity="SmartApps\HistClinicaBundle\Entity\Convenio", inversedBy="costoProcedimiento")
     * @ORM\JoinColumn(name="convenioId",referencedColumnName="convenioId")
     */
    private $convenio;

    /**
     * @var integer
     *
     * @ORM\Column(name="valor", type="bigint")
     */
    private $valor;


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
     * Set procedimiento
     *
     * @param string $procedimiento
     * @return CostoProcedimiento
     */
    public function setProcedimiento(\SmartApps\HistClinicaBundle\Entity\Procedimiento $procedimiento)
    {
        $this->procedimiento = $procedimiento;

        return $this;
    }

    /**
     * Get procedimiento
     *
     * @return string 
     */
    public function getProcedimiento()
    {
        return $this->procedimiento;
    }

    /**
     * Set convenio
     *
     * @param string $convenio
     * @return CostoProcedimiento
     */
    public function setConvenio(\SmartApps\HistClinicaBundle\Entity\Convenio $convenio)
    {
        $this->convenio = $convenio;

        return $this;
    }

    /**
     * Get convenio
     *
     * @return string 
     */
    public function getConvenio()
    {
        return $this->convenio;
    }

    /**
     * Set valor
     *
     * @param integer $valor
     * @return CostoProcedimiento
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
}

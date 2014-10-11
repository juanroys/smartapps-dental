<?php
namespace SmartApps\UsuarioBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Usuario")
 */
class Usuario extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\OneToOne(targetEntity="SmartApps\AgendaBundle\Entity\Medico", mappedBy="usuario", cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    protected $medico;

    public function __construct()
    {
        parent::__construct();
    }
    
    public function setMedico(\SmartApps\AgendaBundle\Entity\Medico $medico){
        $this->medico=$medico;
        return $this;
    }
}
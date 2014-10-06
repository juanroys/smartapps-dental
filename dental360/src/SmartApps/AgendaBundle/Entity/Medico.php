<?php

namespace SmartApps\AgendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * Medico
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Medico
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="medicoId", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nombreCompleto", type="string", length=256)
     */
    private $nombreCompleto;
    
    /**
     * @var string
     *
     * @ORM\Column(name="titulosEspecialidad", type="string", length=1024)
     */
    private $titulosEspecialidad;
    
    /**
     * @var string
     *
     * @ORM\Column(name="pathFirma", type="string", length=1024)
     */
    private $pathFirma;
    
    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }
    

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

    /**
     * Set nombreCompleto
     *
     * @param string $nombreCompleto
     * @return Medico
     */
    public function setNombreCompleto($nombreCompleto)
    {
        $this->nombreCompleto = $nombreCompleto;
        return $this;
    }

    /**
     * Get nombreCompleto
     *
     * @return string 
     */
    public function getNombreCompleto()
    {
        return $this->nombreCompleto;
    }
     
    /**
     * Set titulosEspecialidad
     *
     * @param string $titulosEspecialidad
     * @return Medico
     */
    public function setTitulosEspecialidad($titulosEspecialidad)
    {
        $this->titulosEspecialidad = $titulosEspecialidad;
        return $this;
    }

    /**
     * Get titulosEspecialidad
     *
     * @return string 
     */
    public function getTitulosEspecialidad()
    {
        return $this->titulosEspecialidad;
    }
    
    /**
     * Set pathFirma
     *
     * @param string $pathFirma
     * @return Medico
     */
    public function setPathFirma($pathFirma)
    {
        $this->pathFirma = $pathFirma;
        return $this;
    }

    /**
     * Get pathFirma
     *
     * @return string 
     */
    public function getPathFirma()
    {
        return $this->pathFirma;
    }
    
    
    public function getAbsolutePath()
    {
        return null === $this->pathFirma
            ? null
            : $this->getUploadRootDir().'/'.$this->pathFirma;
    }

    public function getWebPath()
    {
        return null === $this->pathFirma
            ? null
            : $this->getUploadDir().'/'.$this->pathFirma;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/documents';
    }
    
    public function __toString() {
        return $this->nombreCompleto;
    }
    
    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->getFile()->move(
            $this->getUploadRootDir(),
            $this->getFile()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->pathFirma = $this->getFile()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->file = null;
    }

}

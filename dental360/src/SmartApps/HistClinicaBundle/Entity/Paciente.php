<?php

namespace SmartApps\HistClinicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Paciente
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SmartApps\HistClinicaBundle\Entity\PacienteRepository")
 */
class Paciente {

    /**
     * @var integer
     *
     * @ORM\Column(name="pacienteId", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido1", type="string", length=56)
     * @Assert\NotBlank(message = "Por favor, escribe un apellido")
     * 
     */
    private $apellido1;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido2", type="string", length=56)
     *  @Assert\NotBlank(message = "Por favor, escribe un apellido")
     */
    private $apellido2;

    /**
     * @var string
     *
     * @ORM\Column(name="nombres", type="string", length=128)
     *  @Assert\NotBlank(message = "Por favor, escribe un nombre")
     */
    private $nombres;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaNacimiento", type="datetime", nullable=true)
     */
    private $fechaNacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="lugarNacimiento", type="string", length=1024, nullable=true)
     */
    private $lugarNacimiento;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipoIdentificacion", type="integer")
     * @Assert\NotBlank(message = "Por favor, selecciona el tipo de indentificación")
     */
    private $tipoIdentificacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="noIdentificacion", type="string", length=15)
     * @Assert\NotBlank(message = "Por favor, escribe el numero de identificación")
     */
    private $noIdentificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     * @Assert\Email(message= "Debes ingresar una direccion de Email válida")
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="estadoCivil", type="integer", nullable=true)
     */
    private $estadoCivil = -1;

    /**
     * @var integer
     *
     * @ORM\Column(name="sexo", type="integer", nullable=true)
     */
    private $sexo = -1;

    /**
     * @var string
     *
     * @ORM\Column(name="ocupacion", type="string", length=255, nullable=true)
     */
    private $ocupacion;

    /**
     * @var string
     *
     * @ORM\Column(name="empresa", type="string", length=255, nullable=true)
     */
    private $empresa;

    /**
     * @var string
     *
     * @ORM\Column(name="cargo", type="string", length=255, nullable=true)
     */
    private $cargo;

    /**
     * @var string
     *
     * @ORM\Column(name="EPS", type="string", length=255, nullable=true)
     */
    private $ePS;

    /**
     * @var integer
     *
     * @ORM\Column(name="cotizanteBeneficiario", type="integer", nullable=true)
     */
    private $cotizanteBeneficiario;

    /**
     * @var string
     *
     * @ORM\Column(name="responNombreCompleto", type="string", length=255, nullable=true)
     */
    private $responNombreCompleto;

    /**
     * @var integer
     *
     * @ORM\Column(name="responNoIdentificacion", type="string", length=15, nullable=true)
     */
    private $responNoIdentificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="responParentesco", type="string", length=124, nullable=true)
     */
    private $responParentesco;

    /**
     * @var string
     *
     * @ORM\Column(name="residenciaMunicipio", type="string", length=255, nullable=true)
     */
    private $residenciaMunicipio;

    /**
     * @var string
     *
     * @ORM\Column(name="residenciaDepartamento", type="string", length=255, nullable=true)
     */
    private $residenciaDepartamento;

    /**
     * @var string
     *
     * @ORM\Column(name="residenciaDireccion", type="string", length=255, nullable=true)
     */
    private $residenciaDireccion;

    /**
     * @var string
     *
     * @ORM\Column(name="residenciaTelefono", type="string", length=100, nullable=true)
     */
    private $residenciaTelefono;

    /**
     * @var string
     *
     * @ORM\Column(name="trabajoMunicipio", type="string", length=255, nullable=true)
     */
    private $trabajoMunicipio;

    /**
     * @var string
     *
     * @ORM\Column(name="trabajoDepartamento", type="string", length=255, nullable=true)
     */
    private $trabajoDepartamento;

    /**
     * @var string
     *
     * @ORM\Column(name="trabajoDireccion", type="string", length=255, nullable=true)
     */
    private $trabajoDireccion;

    /**
     * @var string
     *
     * @ORM\Column(name="trabajoTelefono", type="string", length=100, nullable=true)
     */
    private $trabajoTelefono;

    /**
     * @var string
     *
     * @ORM\Column(name="responUbicacionDepartamento", type="string", length=255, nullable=true)
     */
    private $responUbicacionDepartamento;

    /**
     * @var string
     *
     * @ORM\Column(name="responUbicacionMunicipio", type="string", length=255, nullable=true)
     */
    private $responUbicacionMunicipio;

    /**
     * @var string
     *
     * @ORM\Column(name="responUbicacionDireccion", type="string", length=255, nullable=true)
     */
    private $responUbicacionDireccion;

    /**
     * @var string
     *
     * @ORM\Column(name="responUbicacionTelefono", type="string", length=100, nullable=true)
     */
    private $responUbicacionTelefono;

    /**
     * @ORM\ManyToOne(targetEntity="SmartApps\HistClinicaBundle\Entity\Convenio")
     * @ORM\JoinColumn(name="convenioId",referencedColumnName="convenioId")
     *  @Assert\NotBlank(message = "Por favor, selecciona un convenio")
     */
    private $convenio;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean",nullable=false,options={"default":0})
     */
    private $activo;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set apellido1
     *
     * @param string $apellido1
     * @return Paciente
     */
    public function setApellido1($apellido1) {
        $this->apellido1 = $apellido1;

        return $this;
    }

    /**
     * Get apellido1
     *
     * @return string 
     */
    public function getApellido1() {
        return $this->apellido1;
    }

    /**
     * Set apellido2
     *
     * @param string $apellido2
     * @return Paciente
     */
    public function setApellido2($apellido2) {
        $this->apellido2 = $apellido2;

        return $this;
    }

    /**
     * Get apellido2
     *
     * @return string 
     */
    public function getApellido2() {
        return $this->apellido2;
    }

    /**
     * Set nombres
     *
     * @param string $nombres
     * @return Paciente
     */
    public function setNombres($nombres) {
        $this->nombres = $nombres;

        return $this;
    }

    /**
     * Get nombres
     *
     * @return string 
     */
    public function getNombres() {
        return $this->nombres;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     * @return Paciente
     */
    public function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return \DateTime 
     */
    public function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    /**
     * Set lugarNacimiento
     *
     * @param string $lugarNacimiento
     * @return Paciente
     */
    public function setLugarNacimiento($lugarNacimiento) {
        $this->lugarNacimiento = $lugarNacimiento;

        return $this;
    }

    /**
     * Get lugarNacimiento
     *
     * @return string 
     */
    public function getLugarNacimiento() {
        return $this->lugarNacimiento;
    }

    /**
     * Set tipoIdentificacion
     *
     * @param integer $tipoIdentificacion
     * @return Paciente
     */
    public function setTipoIdentificacion($tipoIdentificacion) {
        $this->tipoIdentificacion = $tipoIdentificacion;

        return $this;
    }

    /**
     * Get tipoIdentificacion
     *
     * @return integer 
     */
    public function getTipoIdentificacion() {
        return $this->tipoIdentificacion;
    }

    /**
     * Set noIdentificacion
     *
     * @param integer $noIdentificacion
     * @return Paciente
     */
    public function setNoIdentificacion($noIdentificacion) {
        $this->noIdentificacion = $noIdentificacion;

        return $this;
    }

    /**
     * Get noIdentificacion
     *
     * @return integer 
     */
    public function getNoIdentificacion() {
        return $this->noIdentificacion;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Paciente
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set estadoCivil
     *
     * @param integer $estadoCivil
     * @return Paciente
     */
    public function setEstadoCivil($estadoCivil) {
        $this->estadoCivil = $estadoCivil;

        return $this;
    }

    /**
     * Get estadoCivil
     *
     * @return integer 
     */
    public function getEstadoCivil() {
        return $this->estadoCivil;
    }

    /**
     * Set sexo
     *
     * @param integer $sexo
     * @return Paciente
     */
    public function setSexo($sexo) {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return integer 
     */
    public function getSexo() {
        return $this->sexo;
    }

    /**
     * Set ocupacion
     *
     * @param string $ocupacion
     * @return Paciente
     */
    public function setOcupacion($ocupacion) {
        $this->ocupacion = $ocupacion;

        return $this;
    }

    /**
     * Get ocupacion
     *
     * @return string 
     */
    public function getOcupacion() {
        return $this->ocupacion;
    }

    /**
     * Set empresa
     *
     * @param string $empresa
     * @return Paciente
     */
    public function setEmpresa($empresa) {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return string 
     */
    public function getEmpresa() {
        return $this->empresa;
    }

    /**
     * Set cargo
     *
     * @param string $cargo
     * @return Paciente
     */
    public function setCargo($cargo) {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get cargo
     *
     * @return string 
     */
    public function getCargo() {
        return $this->cargo;
    }

    /**
     * Set ePS
     *
     * @param string $ePS
     * @return Paciente
     */
    public function setEPS($ePS) {
        $this->ePS = $ePS;

        return $this;
    }

    /**
     * Get ePS
     *
     * @return string 
     */
    public function getEPS() {
        return $this->ePS;
    }

    /**
     * Set cotizanteBeneficiario
     *
     * @param integer $cotizanteBeneficiario
     * @return Paciente
     */
    public function setCotizanteBeneficiario($cotizanteBeneficiario) {
        $this->cotizanteBeneficiario = $cotizanteBeneficiario;

        return $this;
    }

    /**
     * Get cotizanteBeneficiario
     *
     * @return integer 
     */
    public function getCotizanteBeneficiario() {
        return $this->cotizanteBeneficiario;
    }

    /**
     * Set responNombreCompleto
     *
     * @param string $responNombreCompleto
     * @return Paciente
     */
    public function setResponNombreCompleto($responNombreCompleto) {
        $this->responNombreCompleto = $responNombreCompleto;

        return $this;
    }

    /**
     * Get responNombreCompleto
     *
     * @return string 
     */
    public function getResponNombreCompleto() {
        return $this->responNombreCompleto;
    }

    /**
     * Set responNoIdentificacion
     *
     * @param integer $responNoIdentificacion
     * @return Paciente
     */
    public function setResponNoIdentificacion($responNoIdentificacion) {
        $this->responNoIdentificacion = $responNoIdentificacion;

        return $this;
    }

    /**
     * Get responNoIdentificacion
     *
     * @return integer 
     */
    public function getResponNoIdentificacion() {
        return $this->responNoIdentificacion;
    }

    /**
     * Set responParentesco
     *
     * @param string $responParentesco
     * @return Paciente
     */
    public function setResponParentesco($responParentesco) {
        $this->responParentesco = $responParentesco;

        return $this;
    }

    /**
     * Get responParentesco
     *
     * @return string 
     */
    public function getResponParentesco() {
        return $this->responParentesco;
    }

    /**
     * Set residenciaMunicipio
     *
     * @param string $residenciaMunicipio
     * @return Paciente
     */
    public function setResidenciaMunicipio($residenciaMunicipio) {
        $this->residenciaMunicipio = $residenciaMunicipio;

        return $this;
    }

    /**
     * Get residenciaMunicipio
     *
     * @return string 
     */
    public function getResidenciaMunicipio() {
        return $this->residenciaMunicipio;
    }

    /**
     * Set residenciaDepartamento
     *
     * @param string $residenciaDepartamento
     * @return Paciente
     */
    public function setResidenciaDepartamento($residenciaDepartamento) {
        $this->residenciaDepartamento = $residenciaDepartamento;

        return $this;
    }

    /**
     * Get residenciaDepartamento
     *
     * @return string 
     */
    public function getResidenciaDepartamento() {
        return $this->residenciaDepartamento;
    }

    /**
     * Set residenciaDireccion
     *
     * @param string $residenciaDireccion
     * @return Paciente
     */
    public function setResidenciaDireccion($residenciaDireccion) {
        $this->residenciaDireccion = $residenciaDireccion;

        return $this;
    }

    /**
     * Get residenciaDireccion
     *
     * @return string 
     */
    public function getResidenciaDireccion() {
        return $this->residenciaDireccion;
    }

    /**
     * Set residenciaTelefono
     *
     * @param string $residenciaTelefono
     * @return Paciente
     */
    public function setResidenciaTelefono($residenciaTelefono) {
        $this->residenciaTelefono = $residenciaTelefono;

        return $this;
    }

    /**
     * Get residenciaTelefono
     *
     * @return string 
     */
    public function getResidenciaTelefono() {
        return $this->residenciaTelefono;
    }

    /**
     * Set trabajoMunicipio
     *
     * @param string $trabajoMunicipio
     * @return Paciente
     */
    public function setTrabajoMunicipio($trabajoMunicipio) {
        $this->trabajoMunicipio = $trabajoMunicipio;

        return $this;
    }

    /**
     * Get trabajoMunicipio
     *
     * @return string 
     */
    public function getTrabajoMunicipio() {
        return $this->trabajoMunicipio;
    }

    /**
     * Set trabajoDepartamento
     *
     * @param string $trabajoDepartamento
     * @return Paciente
     */
    public function setTrabajoDepartamento($trabajoDepartamento) {
        $this->trabajoDepartamento = $trabajoDepartamento;

        return $this;
    }

    /**
     * Get trabajoDepartamento
     *
     * @return string 
     */
    public function getTrabajoDepartamento() {
        return $this->trabajoDepartamento;
    }

    /**
     * Set trabajoDireccion
     *
     * @param string $trabajoDireccion
     * @return Paciente
     */
    public function setTrabajoDireccion($trabajoDireccion) {
        $this->trabajoDireccion = $trabajoDireccion;

        return $this;
    }

    /**
     * Get trabajoDireccion
     *
     * @return string 
     */
    public function getTrabajoDireccion() {
        return $this->trabajoDireccion;
    }

    /**
     * Set trabajoTelefono
     *
     * @param string $trabajoTelefono
     * @return Paciente
     */
    public function setTrabajoTelefono($trabajoTelefono) {
        $this->trabajoTelefono = $trabajoTelefono;

        return $this;
    }

    /**
     * Get trabajoTelefono
     *
     * @return string 
     */
    public function getTrabajoTelefono() {
        return $this->trabajoTelefono;
    }

    /**
     * Set responUbicacionDepartamento
     *
     * @param string $responUbicacionDepartamento
     * @return Paciente
     */
    public function setResponUbicacionDepartamento($responUbicacionDepartamento) {
        $this->responUbicacionDepartamento = $responUbicacionDepartamento;

        return $this;
    }

    /**
     * Get responUbicacionDepartamento
     *
     * @return string 
     */
    public function getResponUbicacionDepartamento() {
        return $this->responUbicacionDepartamento;
    }

    /**
     * Set responUbicacionMunicipio
     *
     * @param string $responUbicacionMunicipio
     * @return Paciente
     */
    public function setResponUbicacionMunicipio($responUbicacionMunicipio) {
        $this->responUbicacionMunicipio = $responUbicacionMunicipio;

        return $this;
    }

    /**
     * Get responUbicacionMunicipio
     *
     * @return string 
     */
    public function getResponUbicacionMunicipio() {
        return $this->responUbicacionMunicipio;
    }

    /**
     * Set responUbicacionDireccion
     *
     * @param string $responUbicacionDireccion
     * @return Paciente
     */
    public function setResponUbicacionDireccion($responUbicacionDireccion) {
        $this->responUbicacionDireccion = $responUbicacionDireccion;

        return $this;
    }

    /**
     * Get responUbicacionDireccion
     *
     * @return string 
     */
    public function getResponUbicacionDireccion() {
        return $this->responUbicacionDireccion;
    }

    /**
     * Set responUbicacionTelefono
     *
     * @param string $responUbicacionTelefono
     * @return Paciente
     */
    public function setResponUbicacionTelefono($responUbicacionTelefono) {
        $this->responUbicacionTelefono = $responUbicacionTelefono;

        return $this;
    }

    /**
     * Get responUbicacionTelefono
     *
     * @return string 
     */
    public function getResponUbicacionTelefono() {
        return $this->responUbicacionTelefono;
    }

    /**
     * Set convenio
     *
     * @param string $convenio
     * @return CostoProcedimiento
     */
    public function setConvenio(\SmartApps\HistClinicaBundle\Entity\Convenio $convenio) {
        $this->convenio = $convenio;

        return $this;
    }

    /**
     * Get convenio
     *
     * @return string 
     */
    public function getConvenio() {
        return $this->convenio;
    }

    public function getNombreCompleto() {
        return $this->nombres . ' ' . $this->apellido1 . ' ' . $this->apellido2;
    }

    public function getIdentificacionCompleta()
    {
        $enum =  \SmartApps\HistClinicaBundle\Util\Util::TipoIdentificacionMinEnum();        
        return $enum[$this->tipoIdentificacion] . ' ' . $this->noIdentificacion . ' ' . $this->getNombreCompleto();
        
        //return $this->tipoIdentificacion . ' ' . $this->noIdentificacion;
    }
    
    /**
     * Set activo
     *
     * @param boolean activo
     * @return Paciente
     */
    public function setActivo($activo) {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean 
     */
    public function getActivo() {
        return $this->activo;
    }

    public function __toString() {
        return $this->getNombreCompleto();
    }

}

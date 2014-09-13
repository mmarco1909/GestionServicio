<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prospectos
 *
 * @ORM\Table(name="prospectos")
 * @ORM\Entity(repositoryClass="SisVen\SistemaBundle\Entity\ProspectosRepository")
 */
class Prospectos
{
    /**
     * @var string
     *
     * @ORM\Column(name="id_producto", type="string", length=10, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="mat_ase", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $matAse;

    /**
     * @var string
     *
     * @ORM\Column(name="cuspp", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cuspp;
    
    public function __construct($idProducto, $matAse, $cuspp)
    {
        $this->idProducto = $idProducto;
        $this->matAse = $matAse;
        $this->cuspp = $cuspp;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="producto", type="string", length=45, nullable=true)
     */
    private $producto;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_ase", type="string", length=100, nullable=true)
     */
    private $nomAse;

    /**
     * @var string
     *
     * @ORM\Column(name="mat_sup", type="string", length=20, nullable=false)
     */
    private $matSup;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_sup", type="string", length=100, nullable=true)
     */
    private $nomSup;

    /**
     * @var string
     *
     * @ORM\Column(name="plaza", type="string", length=45, nullable=true)
     */
    private $plaza;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_ffvv", type="string", length=45, nullable=true)
     */
    private $tipoFfvv;

    /**
     * @var string
     *
     * @ORM\Column(name="mat_ger", type="string", length=20, nullable=false)
     */
    private $matGer;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_ger", type="string", length=100, nullable=true)
     */
    private $nomGer;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=45, nullable=true)
     */
    private $region;

    /**
     * @var string
     *
     * @ORM\Column(name="ruc", type="string", length=45, nullable=true)
     */
    private $ruc;

    /**
     * @var string
     *
     * @ORM\Column(name="empresa", type="string", length=45, nullable=true)
     */
    private $empresa;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_empresa", type="string", length=45, nullable=true)
     */
    private $tipoEmpresa;

    /**
     * @var float
     *
     * @ORM\Column(name="ram", type="float", precision=10, scale=0, nullable=false)
     */
    private $ram;

    /**
     * @var string
     *
     * @ORM\Column(name="rango_ram", type="string", length=45, nullable=true)
     */
    private $rangoRam;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_cliente", type="string", length=45, nullable=true)
     */
    private $tipoCliente;

    /**
     * @var string
     *
     * @ORM\Column(name="afp", type="string", length=45, nullable=false)
     */
    private $afp;

    /**
     * @var string
     *
     * @ORM\Column(name="tipdoc", type="string", length=45, nullable=true)
     */
    private $tipdoc;

    /**
     * @var string
     *
     * @ORM\Column(name="numdoc", type="string", length=20, nullable=true)
     */
    private $numdoc;

    /**
     * @var string
     *
     * @ORM\Column(name="primer_nm", type="string", length=45, nullable=true)
     */
    private $primerNm;

    /**
     * @var string
     *
     * @ORM\Column(name="segundo_nm", type="string", length=45, nullable=true)
     */
    private $segundoNm;

    /**
     * @var string
     *
     * @ORM\Column(name="primer_ap", type="string", length=45, nullable=true)
     */
    private $primerAp;

    /**
     * @var string
     *
     * @ORM\Column(name="segundo_ap", type="string", length=45, nullable=true)
     */
    private $segundoAp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fec_nacimiento", type="datetime", nullable=true)
     */
    private $fecNacimiento;

    /**
     * @var integer
     *
     * @ORM\Column(name="edad", type="integer", nullable=true)
     */
    private $edad;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=45, nullable=true)
     */
    private $sexo;

    /**
     * @var string
     *
     * @ORM\Column(name="nacionalidad", type="string", length=45, nullable=true)
     */
    private $nacionalidad;

    /**
     * @var string
     *
     * @ORM\Column(name="telefonos", type="string", length=255, nullable=true)
     */
    private $telefonos;

    /**
     * @var string
     *
     * @ORM\Column(name="emails", type="string", length=255, nullable=true)
     */
    private $emails;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_hora", type="datetime", nullable=true)
     */
    private $fechaHora;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_proceso_estado", type="integer", nullable=true)
     */
    private $idProcesoEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="proceso_estado", type="string", length=45, nullable=true)
     */
    private $procesoEstado;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_proceso_etapa", type="integer", nullable=true)
     */
    private $idProcesoEtapa;

    /**
     * @var string
     *
     * @ORM\Column(name="proceso_etapa", type="string", length=45, nullable=true)
     */
    private $procesoEtapa;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_proceso_resultado", type="integer", nullable=true)
     */
    private $idProcesoResultado;

    /**
     * @var string
     *
     * @ORM\Column(name="proceso_resultado", type="string", length=45, nullable=true)
     */
    private $procesoResultado;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_proceso_motivo", type="integer", nullable=true)
     */
    private $idProcesoMotivo;

    /**
     * @var string
     *
     * @ORM\Column(name="proceso_motivo", type="string", length=255, nullable=true)
     */
    private $procesoMotivo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="gest_fecha_hora", type="datetime", nullable=true)
     */
    private $gestFechaHora;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="gest_fecha_siguiente", type="datetime", nullable=true)
     */
    private $gestFechaSiguiente;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="gest_hora_siguiente", type="datetime", nullable=true)
     */
    private $gestHoraSiguiente;

    /**
     * @var string
     *
     * @ORM\Column(name="gest_lugar", type="string", length=45, nullable=true)
     */
    private $gestLugar;

    /**
     * @var string
     *
     * @ORM\Column(name="gest_afp", type="string", length=45, nullable=true)
     */
    private $gestAfp;

    /**
     * @var float
     *
     * @ORM\Column(name="gest_ram", type="float", precision=10, scale=0, nullable=true)
     */
    private $gestRam;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ultima_prospeccion", type="datetime", nullable=true)
     */
    private $fechaUltimaProspeccion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ultima_llamada", type="datetime", nullable=true)
     */
    private $fechaUltimaLlamada;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ultima_cita", type="datetime", nullable=true)
     */
    private $fechaUltimaCita;



    /**
     * Set idProducto
     *
     * @param string $idProducto
     * @return Prospectos
     */
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;

        return $this;
    }

    /**
     * Get idProducto
     *
     * @return string 
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * Set matAse
     *
     * @param string $matAse
     * @return Prospectos
     */
    public function setMatAse($matAse)
    {
        $this->matAse = $matAse;

        return $this;
    }

    /**
     * Get matAse
     *
     * @return string 
     */
    public function getMatAse()
    {
        return $this->matAse;
    }

    /**
     * Set cuspp
     *
     * @param string $cuspp
     * @return Prospectos
     */
    public function setCuspp($cuspp)
    {
        $this->cuspp = $cuspp;

        return $this;
    }

    /**
     * Get cuspp
     *
     * @return string 
     */
    public function getCuspp()
    {
        return $this->cuspp;
    }

    /**
     * Set producto
     *
     * @param string $producto
     * @return Prospectos
     */
    public function setProducto($producto)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return string 
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set nomAse
     *
     * @param string $nomAse
     * @return Prospectos
     */
    public function setNomAse($nomAse)
    {
        $this->nomAse = $nomAse;

        return $this;
    }

    /**
     * Get nomAse
     *
     * @return string 
     */
    public function getNomAse()
    {
        return $this->nomAse;
    }

    /**
     * Set matSup
     *
     * @param string $matSup
     * @return Prospectos
     */
    public function setMatSup($matSup)
    {
        $this->matSup = $matSup;

        return $this;
    }

    /**
     * Get matSup
     *
     * @return string 
     */
    public function getMatSup()
    {
        return $this->matSup;
    }

    /**
     * Set nomSup
     *
     * @param string $nomSup
     * @return Prospectos
     */
    public function setNomSup($nomSup)
    {
        $this->nomSup = $nomSup;

        return $this;
    }

    /**
     * Get nomSup
     *
     * @return string 
     */
    public function getNomSup()
    {
        return $this->nomSup;
    }

    /**
     * Set plaza
     *
     * @param string $plaza
     * @return Prospectos
     */
    public function setPlaza($plaza)
    {
        $this->plaza = $plaza;

        return $this;
    }

    /**
     * Get plaza
     *
     * @return string 
     */
    public function getPlaza()
    {
        return $this->plaza;
    }

    /**
     * Set tipoFfvv
     *
     * @param string $tipoFfvv
     * @return Prospectos
     */
    public function setTipoFfvv($tipoFfvv)
    {
        $this->tipoFfvv = $tipoFfvv;

        return $this;
    }

    /**
     * Get tipoFfvv
     *
     * @return string 
     */
    public function getTipoFfvv()
    {
        return $this->tipoFfvv;
    }

    /**
     * Set matGer
     *
     * @param string $matGer
     * @return Prospectos
     */
    public function setMatGer($matGer)
    {
        $this->matGer = $matGer;

        return $this;
    }

    /**
     * Get matGer
     *
     * @return string 
     */
    public function getMatGer()
    {
        return $this->matGer;
    }

    /**
     * Set nomGer
     *
     * @param string $nomGer
     * @return Prospectos
     */
    public function setNomGer($nomGer)
    {
        $this->nomGer = $nomGer;

        return $this;
    }

    /**
     * Get nomGer
     *
     * @return string 
     */
    public function getNomGer()
    {
        return $this->nomGer;
    }

    /**
     * Set region
     *
     * @param string $region
     * @return Prospectos
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set ruc
     *
     * @param string $ruc
     * @return Prospectos
     */
    public function setRuc($ruc)
    {
        $this->ruc = $ruc;

        return $this;
    }

    /**
     * Get ruc
     *
     * @return string 
     */
    public function getRuc()
    {
        return $this->ruc;
    }

    /**
     * Set empresa
     *
     * @param string $empresa
     * @return Prospectos
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return string 
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set tipoEmpresa
     *
     * @param string $tipoEmpresa
     * @return Prospectos
     */
    public function setTipoEmpresa($tipoEmpresa)
    {
        $this->tipoEmpresa = $tipoEmpresa;

        return $this;
    }

    /**
     * Get tipoEmpresa
     *
     * @return string 
     */
    public function getTipoEmpresa()
    {
        return $this->tipoEmpresa;
    }

    /**
     * Set ram
     *
     * @param float $ram
     * @return Prospectos
     */
    public function setRam($ram)
    {
        $this->ram = $ram;

        return $this;
    }

    /**
     * Get ram
     *
     * @return float 
     */
    public function getRam()
    {
        return $this->ram;
    }

    /**
     * Set rangoRam
     *
     * @param string $rangoRam
     * @return Prospectos
     */
    public function setRangoRam($rangoRam)
    {
        $this->rangoRam = $rangoRam;

        return $this;
    }

    /**
     * Get rangoRam
     *
     * @return string 
     */
    public function getRangoRam()
    {
        return $this->rangoRam;
    }

    /**
     * Set tipoCliente
     *
     * @param string $tipoCliente
     * @return Prospectos
     */
    public function setTipoCliente($tipoCliente)
    {
        $this->tipoCliente = $tipoCliente;

        return $this;
    }

    /**
     * Get tipoCliente
     *
     * @return string 
     */
    public function getTipoCliente()
    {
        return $this->tipoCliente;
    }

    /**
     * Set afp
     *
     * @param string $afp
     * @return Prospectos
     */
    public function setAfp($afp)
    {
        $this->afp = $afp;

        return $this;
    }

    /**
     * Get afp
     *
     * @return string 
     */
    public function getAfp()
    {
        return $this->afp;
    }

    /**
     * Set tipdoc
     *
     * @param string $tipdoc
     * @return Prospectos
     */
    public function setTipdoc($tipdoc)
    {
        $this->tipdoc = $tipdoc;

        return $this;
    }

    /**
     * Get tipdoc
     *
     * @return string 
     */
    public function getTipdoc()
    {
        return $this->tipdoc;
    }

    /**
     * Set numdoc
     *
     * @param string $numdoc
     * @return Prospectos
     */
    public function setNumdoc($numdoc)
    {
        $this->numdoc = $numdoc;

        return $this;
    }

    /**
     * Get numdoc
     *
     * @return string 
     */
    public function getNumdoc()
    {
        return $this->numdoc;
    }

    /**
     * Set primerNm
     *
     * @param string $primerNm
     * @return Prospectos
     */
    public function setPrimerNm($primerNm)
    {
        $this->primerNm = $primerNm;

        return $this;
    }

    /**
     * Get primerNm
     *
     * @return string 
     */
    public function getPrimerNm()
    {
        return $this->primerNm;
    }

    /**
     * Set segundoNm
     *
     * @param string $segundoNm
     * @return Prospectos
     */
    public function setSegundoNm($segundoNm)
    {
        $this->segundoNm = $segundoNm;

        return $this;
    }

    /**
     * Get segundoNm
     *
     * @return string 
     */
    public function getSegundoNm()
    {
        return $this->segundoNm;
    }

    /**
     * Set primerAp
     *
     * @param string $primerAp
     * @return Prospectos
     */
    public function setPrimerAp($primerAp)
    {
        $this->primerAp = $primerAp;

        return $this;
    }

    /**
     * Get primerAp
     *
     * @return string 
     */
    public function getPrimerAp()
    {
        return $this->primerAp;
    }

    /**
     * Set segundoAp
     *
     * @param string $segundoAp
     * @return Prospectos
     */
    public function setSegundoAp($segundoAp)
    {
        $this->segundoAp = $segundoAp;

        return $this;
    }

    /**
     * Get segundoAp
     *
     * @return string 
     */
    public function getSegundoAp()
    {
        return $this->segundoAp;
    }

    /**
     * Set fecNacimiento
     *
     * @param \DateTime $fecNacimiento
     * @return Prospectos
     */
    public function setFecNacimiento($fecNacimiento)
    {
        $this->fecNacimiento = $fecNacimiento;

        return $this;
    }

    /**
     * Get fecNacimiento
     *
     * @return \DateTime 
     */
    public function getFecNacimiento()
    {
        return $this->fecNacimiento;
    }

    /**
     * Set edad
     *
     * @param integer $edad
     * @return Prospectos
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get edad
     *
     * @return integer 
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     * @return Prospectos
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string 
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set nacionalidad
     *
     * @param string $nacionalidad
     * @return Prospectos
     */
    public function setNacionalidad($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;

        return $this;
    }

    /**
     * Get nacionalidad
     *
     * @return string 
     */
    public function getNacionalidad()
    {
        return $this->nacionalidad;
    }

    /**
     * Set telefonos
     *
     * @param string $telefonos
     * @return Prospectos
     */
    public function setTelefonos($telefonos)
    {
        $this->telefonos = $telefonos;
    
        return $this;
    }

    /**
     * Get telefonos
     *
     * @return string 
     */
    public function getTelefonos()
    {
        return $this->telefonos;
    }

    /**
     * Set emails
     *
     * @param string $emails
     * @return Prospectos
     */
    public function setEmails($emails)
    {
        $this->emails = $emails;
    
        return $this;
    }

    /**
     * Get emails
     *
     * @return string 
     */
    public function getEmails()
    {
        return $this->emails;
    }
    

    /**
     * Set fechaHora
     *
     * @param \DateTime $fechaHora
     * @return Prospectos
     */
    public function setFechaHora($fechaHora)
    {
        $this->fechaHora = $fechaHora;

        return $this;
    }

    /**
     * Get fechaHora
     *
     * @return \DateTime 
     */
    public function getFechaHora()
    {
        return $this->fechaHora;
    }

    /**
     * Set idProcesoEstado
     *
     * @param integer $idProcesoEstado
     * @return Prospectos
     */
    public function setIdProcesoEstado($idProcesoEstado)
    {
        $this->idProcesoEstado = $idProcesoEstado;

        return $this;
    }

    /**
     * Get idProcesoEstado
     *
     * @return integer 
     */
    public function getIdProcesoEstado()
    {
        return $this->idProcesoEstado;
    }

    /**
     * Set procesoEstado
     *
     * @param string $procesoEstado
     * @return Prospectos
     */
    public function setProcesoEstado($procesoEstado)
    {
        $this->procesoEstado = $procesoEstado;

        return $this;
    }

    /**
     * Get procesoEstado
     *
     * @return string 
     */
    public function getProcesoEstado()
    {
        return $this->procesoEstado;
    }

    /**
     * Set idProcesoEtapa
     *
     * @param integer $idProcesoEtapa
     * @return Prospectos
     */
    public function setIdProcesoEtapa($idProcesoEtapa)
    {
        $this->idProcesoEtapa = $idProcesoEtapa;

        return $this;
    }

    /**
     * Get idProcesoEtapa
     *
     * @return integer 
     */
    public function getIdProcesoEtapa()
    {
        return $this->idProcesoEtapa;
    }

    /**
     * Set procesoEtapa
     *
     * @param string $procesoEtapa
     * @return Prospectos
     */
    public function setProcesoEtapa($procesoEtapa)
    {
        $this->procesoEtapa = $procesoEtapa;

        return $this;
    }

    /**
     * Get procesoEtapa
     *
     * @return string 
     */
    public function getProcesoEtapa()
    {
        return $this->procesoEtapa;
    }

    /**
     * Set idProcesoResultado
     *
     * @param integer $idProcesoResultado
     * @return Prospectos
     */
    public function setIdProcesoResultado($idProcesoResultado)
    {
        $this->idProcesoResultado = $idProcesoResultado;

        return $this;
    }

    /**
     * Get idProcesoResultado
     *
     * @return integer 
     */
    public function getIdProcesoResultado()
    {
        return $this->idProcesoResultado;
    }

    /**
     * Set procesoResultado
     *
     * @param string $procesoResultado
     * @return Prospectos
     */
    public function setProcesoResultado($procesoResultado)
    {
        $this->procesoResultado = $procesoResultado;

        return $this;
    }

    /**
     * Get procesoResultado
     *
     * @return string 
     */
    public function getProcesoResultado()
    {
        return $this->procesoResultado;
    }

    /**
     * Set idProcesoMotivo
     *
     * @param integer $idProcesoMotivo
     * @return Prospectos
     */
    public function setIdProcesoMotivo($idProcesoMotivo)
    {
        $this->idProcesoMotivo = $idProcesoMotivo;

        return $this;
    }

    /**
     * Get idProcesoMotivo
     *
     * @return integer 
     */
    public function getIdProcesoMotivo()
    {
        return $this->idProcesoMotivo;
    }

    /**
     * Set procesoMotivo
     *
     * @param string $procesoMotivo
     * @return Prospectos
     */
    public function setProcesoMotivo($procesoMotivo)
    {
        $this->procesoMotivo = $procesoMotivo;

        return $this;
    }

    /**
     * Get procesoMotivo
     *
     * @return string 
     */
    public function getProcesoMotivo()
    {
        return $this->procesoMotivo;
    }

    /**
     * Set gestFechaHora
     *
     * @param \DateTime $gestFechaHora
     * @return Prospectos
     */
    public function setGestFechaHora($gestFechaHora)
    {
        $this->gestFechaHora = $gestFechaHora;

        return $this;
    }

    /**
     * Get gestFechaHora
     *
     * @return \DateTime 
     */
    public function getGestFechaHora()
    {
        return $this->gestFechaHora;
    }

    /**
     * Set gestFechaSiguiente
     *
     * @param \DateTime $gestFechaSiguiente
     * @return Prospectos
     */
    public function setGestFechaSiguiente($gestFechaSiguiente)
    {
        $this->gestFechaSiguiente = $gestFechaSiguiente;

        return $this;
    }

    /**
     * Get gestFechaSiguiente
     *
     * @return \DateTime 
     */
    public function getGestFechaSiguiente()
    {
        return $this->gestFechaSiguiente;
    }

    /**
     * Set gestHoraSiguiente
     *
     * @param \DateTime $gestHoraSiguiente
     * @return Prospectos
     */
    public function setGestHoraSiguiente($gestHoraSiguiente)
    {
        $this->gestHoraSiguiente = $gestHoraSiguiente;

        return $this;
    }

    /**
     * Get gestHoraSiguiente
     *
     * @return \DateTime 
     */
    public function getGestHoraSiguiente()
    {
        return $this->gestHoraSiguiente;
    }

    /**
     * Set gestLugar
     *
     * @param string $gestLugar
     * @return Prospectos
     */
    public function setGestLugar($gestLugar)
    {
        $this->gestLugar = $gestLugar;

        return $this;
    }

    /**
     * Get gestLugar
     *
     * @return string 
     */
    public function getGestLugar()
    {
        return $this->gestLugar;
    }

    /**
     * Set gestAfp
     *
     * @param string $gestAfp
     * @return Prospectos
     */
    public function setGestAfp($gestAfp)
    {
        $this->gestAfp = $gestAfp;

        return $this;
    }

    /**
     * Get gestAfp
     *
     * @return string 
     */
    public function getGestAfp()
    {
        return $this->gestAfp;
    }

    /**
     * Set gestRam
     *
     * @param float $gestRam
     * @return Prospectos
     */
    public function setGestRam($gestRam)
    {
        $this->gestRam = $gestRam;

        return $this;
    }

    /**
     * Get gestRam
     *
     * @return float 
     */
    public function getGestRam()
    {
        return $this->gestRam;
    }

    /**
     * Set fechaUltimaProspeccion
     *
     * @param \DateTime $fechaUltimaProspeccion
     * @return Prospectos
     */
    public function setFechaUltimaProspeccion($fechaUltimaProspeccion)
    {
        $this->fechaUltimaProspeccion = $fechaUltimaProspeccion;

        return $this;
    }

    /**
     * Get fechaUltimaProspeccion
     *
     * @return \DateTime 
     */
    public function getFechaUltimaProspeccion()
    {
        return $this->fechaUltimaProspeccion;
    }

    /**
     * Set fechaUltimaLlamada
     *
     * @param \DateTime $fechaUltimaLlamada
     * @return Prospectos
     */
    public function setFechaUltimaLlamada($fechaUltimaLlamada)
    {
        $this->fechaUltimaLlamada = $fechaUltimaLlamada;

        return $this;
    }

    /**
     * Get fechaUltimaLlamada
     *
     * @return \DateTime 
     */
    public function getFechaUltimaLlamada()
    {
        return $this->fechaUltimaLlamada;
    }

    /**
     * Set fechaUltimaCita
     *
     * @param \DateTime $fechaUltimaCita
     * @return Prospectos
     */
    public function setFechaUltimaCita($fechaUltimaCita)
    {
        $this->fechaUltimaCita = $fechaUltimaCita;

        return $this;
    }

    /**
     * Get fechaUltimaCita
     *
     * @return \DateTime 
     */
    public function getFechaUltimaCita()
    {
        return $this->fechaUltimaCita;
    }
}

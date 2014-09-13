<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProspectosAll
 *
 * @ORM\Table(name="prospectos_all")
 * @ORM\Entity(repositoryClass="SisVen\SistemaBundle\Entity\ProspectosAllRepository")
 */
class ProspectosAll
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
     * @var integer
     *
     * @ORM\Column(name="estado", type="integer", nullable=true)
     */
    private $estado;

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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_hora", type="datetime", nullable=true)
     */
    private $fechaHora;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_gestion", type="datetime", nullable=true)
     */
    private $fechaGestion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_siguiente", type="datetime", nullable=true)
     */
    private $fechaSiguiente;

    /**
     * @var string
     *
     * @ORM\Column(name="motivo", type="string", length=255, nullable=true)
     */
    private $motivo;

    /**
     * @var float
     *
     * @ORM\Column(name="monto", type="float", precision=10, scale=0, nullable=true)
     */
    private $monto;



    /**
     * Set idProducto
     *
     * @param string $idProducto
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * Set estado
     *
     * @param integer $estado
     * @return ProspectosAll
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return integer 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set fechaUltimaProspeccion
     *
     * @param \DateTime $fechaUltimaProspeccion
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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

    /**
     * Set idProcesoEtapa
     *
     * @param integer $idProcesoEtapa
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * @return ProspectosAll
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
     * Set fechaHora
     *
     * @param \DateTime $fechaHora
     * @return ProspectosAll
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
     * Set fechaGestion
     *
     * @param \DateTime $fechaGestion
     * @return ProspectosAll
     */
    public function setFechaGestion($fechaGestion)
    {
        $this->fechaGestion = $fechaGestion;

        return $this;
    }

    /**
     * Get fechaGestion
     *
     * @return \DateTime 
     */
    public function getFechaGestion()
    {
        return $this->fechaGestion;
    }

    /**
     * Set fechaSiguiente
     *
     * @param \DateTime $fechaSiguiente
     * @return ProspectosAll
     */
    public function setFechaSiguiente($fechaSiguiente)
    {
        $this->fechaSiguiente = $fechaSiguiente;

        return $this;
    }

    /**
     * Get fechaSiguiente
     *
     * @return \DateTime 
     */
    public function getFechaSiguiente()
    {
        return $this->fechaSiguiente;
    }

    /**
     * Set motivo
     *
     * @param string $motivo
     * @return ProspectosAll
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;

        return $this;
    }

    /**
     * Get motivo
     *
     * @return string 
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * Set monto
     *
     * @param float $monto
     * @return ProspectosAll
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Get monto
     *
     * @return float 
     */
    public function getMonto()
    {
        return $this->monto;
    }
}

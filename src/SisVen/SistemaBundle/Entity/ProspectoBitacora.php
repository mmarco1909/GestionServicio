<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProspectoBitacora
 *
 * @ORM\Table(name="prospecto_bitacora")
 * @ORM\Entity(repositoryClass="SisVen\SistemaBundle\Entity\ProspectoBitacoraRepository")
 */
class ProspectoBitacora
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_bitacora", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cuspp", type="string", length=20, nullable=false)
     */
    private $cuspp;

    /**
     * @var string
     *
     * @ORM\Column(name="id_usuario", type="string", length=20, nullable=false)
     */
    private $idUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="id_producto", type="string", length=10, nullable=false)
     */
    private $idProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="periodo", type="string", length=6, nullable=false)
     */
    private $periodo;

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
     * @var string
     *
     * @ORM\Column(name="gest_observacion", type="string", length=255, nullable=true)
     */
    private $gestObservacion;



    /**
     * Get idBitacora
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cuspp
     *
     * @param string $cuspp
     * @return ProspectoBitacora
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
     * Set idUsuario
     *
     * @param string $idUsuario
     * @return ProspectoBitacora
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return string 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set idProducto
     *
     * @param string $idProducto
     * @return ProspectoBitacora
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
     * Set periodo
     *
     * @param string $periodo
     * @return ProspectoBitacora
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;

        return $this;
    }

    /**
     * Get periodo
     *
     * @return string 
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * Set fechaHora
     *
     * @param \DateTime $fechaHora
     * @return ProspectoBitacora
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
     * @return ProspectoBitacora
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
     * @return ProspectoBitacora
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
     * @return ProspectoBitacora
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
     * @return ProspectoBitacora
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
     * @return ProspectoBitacora
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
     * @return ProspectoBitacora
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
     * @return ProspectoBitacora
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
     * @return ProspectoBitacora
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
     * @return ProspectoBitacora
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
     * @return ProspectoBitacora
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
     * Set gestLugar
     *
     * @param string $gestLugar
     * @return ProspectoBitacora
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
     * @return ProspectoBitacora
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
     * @return ProspectoBitacora
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
     * Set gestObservacion
     *
     * @param string $gestObservacion
     * @return ProspectoBitacora
     */
    public function setGestObservacion($gestObservacion)
    {
        $this->gestObservacion = $gestObservacion;

        return $this;
    }

    /**
     * Get gestObservacion
     *
     * @return string 
     */
    public function getGestObservacion()
    {
        return $this->gestObservacion;
    }
}

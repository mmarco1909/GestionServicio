<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SeguimientoPlan
 *
 * @ORM\Table(name="seguimiento_plan", indexes={@ORM\Index(name="fk_seguimiento_plan_seguimiento_accion1_idx", columns={"id_seguimiento_accion"}), @ORM\Index(name="fk_seguimiento_plan_estado_plan1_idx", columns={"id_estado_plan"}), @ORM\Index(name="fk_seguimiento_plan_usuario1_idx", columns={"id_usuario_lider"}), @ORM\Index(name="fk_seguimiento_plan_usuario2_idx", columns={"id_usuario_evaluado"}), @ORM\Index(name="fk_seguimiento_plan_producto1_idx", columns={"id_producto"}), @ORM\Index(name="fk_seguimiento_plan_proceso_etapa1_idx", columns={"id_proceso_etapa"})})
 * @ORM\Entity
 */
class SeguimientoPlan
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_seguimiento_plan", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSeguimientoPlan;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_hora", type="datetime", nullable=false)
     */
    private $fechaHora;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_medicion", type="string", length=10, nullable=false)
     */
    private $tipoMedicion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="datetime", nullable=false)
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin", type="datetime", nullable=false)
     */
    private $fechaFin;

    /**
     * @var float
     *
     * @ORM\Column(name="meta_objetivo", type="float", precision=10, scale=0, nullable=true)
     */
    private $metaObjetivo;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string", length=255, nullable=true)
     */
    private $observacion;

    /**
     * @var \SeguimientoAccion
     *
     * @ORM\ManyToOne(targetEntity="SeguimientoAccion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_seguimiento_accion", referencedColumnName="id_seguimiento_accion")
     * })
     */
    private $idSeguimientoAccion;

    /**
     * @var \EstadoPlan
     *
     * @ORM\ManyToOne(targetEntity="EstadoPlan")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estado_plan", referencedColumnName="id_estado_plan")
     * })
     */
    private $idEstadoPlan;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario_lider", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuarioLider;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario_evaluado", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuarioEvaluado;

    /**
     * @var \Producto
     *
     * @ORM\ManyToOne(targetEntity="Producto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_producto", referencedColumnName="id_producto")
     * })
     */
    private $idProducto;

    /**
     * @var \ProcesoEtapa
     *
     * @ORM\ManyToOne(targetEntity="ProcesoEtapa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_proceso_etapa", referencedColumnName="id_proceso_etapa")
     * })
     */
    private $idProcesoEtapa;



    /**
     * Get idSeguimientoPlan
     *
     * @return integer 
     */
    public function getIdSeguimientoPlan()
    {
        return $this->idSeguimientoPlan;
    }

    /**
     * Set fechaHora
     *
     * @param \DateTime $fechaHora
     * @return SeguimientoPlan
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
     * Set tipoMedicion
     *
     * @param string $tipoMedicion
     * @return SeguimientoPlan
     */
    public function setTipoMedicion($tipoMedicion)
    {
        $this->tipoMedicion = $tipoMedicion;

        return $this;
    }

    /**
     * Get tipoMedicion
     *
     * @return string 
     */
    public function getTipoMedicion()
    {
        return $this->tipoMedicion;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return SeguimientoPlan
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime 
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return SeguimientoPlan
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime 
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set metaObjetivo
     *
     * @param float $metaObjetivo
     * @return SeguimientoPlan
     */
    public function setMetaObjetivo($metaObjetivo)
    {
        $this->metaObjetivo = $metaObjetivo;

        return $this;
    }

    /**
     * Get metaObjetivo
     *
     * @return float 
     */
    public function getMetaObjetivo()
    {
        return $this->metaObjetivo;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     * @return SeguimientoPlan
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Get observacion
     *
     * @return string 
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set idSeguimientoAccion
     *
     * @param \SisVen\SistemaBundle\Entity\SeguimientoAccion $idSeguimientoAccion
     * @return SeguimientoPlan
     */
    public function setIdSeguimientoAccion(\SisVen\SistemaBundle\Entity\SeguimientoAccion $idSeguimientoAccion = null)
    {
        $this->idSeguimientoAccion = $idSeguimientoAccion;

        return $this;
    }

    /**
     * Get idSeguimientoAccion
     *
     * @return \SisVen\SistemaBundle\Entity\SeguimientoAccion 
     */
    public function getIdSeguimientoAccion()
    {
        return $this->idSeguimientoAccion;
    }

    /**
     * Set idEstadoPlan
     *
     * @param \SisVen\SistemaBundle\Entity\EstadoPlan $idEstadoPlan
     * @return SeguimientoPlan
     */
    public function setIdEstadoPlan(\SisVen\SistemaBundle\Entity\EstadoPlan $idEstadoPlan = null)
    {
        $this->idEstadoPlan = $idEstadoPlan;

        return $this;
    }

    /**
     * Get idEstadoPlan
     *
     * @return \SisVen\SistemaBundle\Entity\EstadoPlan 
     */
    public function getIdEstadoPlan()
    {
        return $this->idEstadoPlan;
    }

    /**
     * Set idUsuarioLider
     *
     * @param \SisVen\SistemaBundle\Entity\Usuario $idUsuarioLider
     * @return SeguimientoPlan
     */
    public function setIdUsuarioLider(\SisVen\SistemaBundle\Entity\Usuario $idUsuarioLider = null)
    {
        $this->idUsuarioLider = $idUsuarioLider;

        return $this;
    }

    /**
     * Get idUsuarioLider
     *
     * @return \SisVen\SistemaBundle\Entity\Usuario 
     */
    public function getIdUsuarioLider()
    {
        return $this->idUsuarioLider;
    }

    /**
     * Set idUsuarioEvaluado
     *
     * @param \SisVen\SistemaBundle\Entity\Usuario $idUsuarioEvaluado
     * @return SeguimientoPlan
     */
    public function setIdUsuarioEvaluado(\SisVen\SistemaBundle\Entity\Usuario $idUsuarioEvaluado = null)
    {
        $this->idUsuarioEvaluado = $idUsuarioEvaluado;

        return $this;
    }

    /**
     * Get idUsuarioEvaluado
     *
     * @return \SisVen\SistemaBundle\Entity\Usuario 
     */
    public function getIdUsuarioEvaluado()
    {
        return $this->idUsuarioEvaluado;
    }

    /**
     * Set idProducto
     *
     * @param \SisVen\SistemaBundle\Entity\Producto $idProducto
     * @return SeguimientoPlan
     */
    public function setIdProducto(\SisVen\SistemaBundle\Entity\Producto $idProducto = null)
    {
        $this->idProducto = $idProducto;

        return $this;
    }

    /**
     * Get idProducto
     *
     * @return \SisVen\SistemaBundle\Entity\Producto 
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * Set idProcesoEtapa
     *
     * @param \SisVen\SistemaBundle\Entity\ProcesoEtapa $idProcesoEtapa
     * @return SeguimientoPlan
     */
    public function setIdProcesoEtapa(\SisVen\SistemaBundle\Entity\ProcesoEtapa $idProcesoEtapa = null)
    {
        $this->idProcesoEtapa = $idProcesoEtapa;

        return $this;
    }

    /**
     * Get idProcesoEtapa
     *
     * @return \SisVen\SistemaBundle\Entity\ProcesoEtapa 
     */
    public function getIdProcesoEtapa()
    {
        return $this->idProcesoEtapa;
    }
}

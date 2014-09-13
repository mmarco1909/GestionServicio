<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MetaProceso
 *
 * @ORM\Table(name="meta_proceso", indexes={@ORM\Index(name="fk_meta_proceso_proceso_etapa1_idx", columns={"id_proceso_etapa"}), @ORM\Index(name="fk_meta_proceso_tipo_ffvv1_idx", columns={"id_tipo_ffvv"}), @ORM\Index(name="fk_meta_proceso_producto1_idx", columns={"id_producto"}), @ORM\Index(name="fk_meta_proceso_periodo1_idx", columns={"periodo"})})
 * @ORM\Entity
 */
class MetaProceso
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_meta_proceso", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMetaProceso;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_medicion", type="string", length=10, nullable=false)
     */
    private $tipoMedicion;

    /**
     * @var string
     *
     * @ORM\Column(name="frecuencia", type="string", length=10, nullable=false)
     */
    private $frecuencia;

    /**
     * @var float
     *
     * @ORM\Column(name="meta", type="float", precision=10, scale=0, nullable=false)
     */
    private $meta;

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
     * @var \TipoFfvv
     *
     * @ORM\ManyToOne(targetEntity="TipoFfvv")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_ffvv", referencedColumnName="id_tipo_ffvv")
     * })
     */
    private $idTipoFfvv;

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
     * @var \Periodo
     *
     * @ORM\ManyToOne(targetEntity="Periodo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="periodo", referencedColumnName="periodo")
     * })
     */
    private $periodo;



    /**
     * Get idMetaProceso
     *
     * @return integer 
     */
    public function getIdMetaProceso()
    {
        return $this->idMetaProceso;
    }

    /**
     * Set tipoMedicion
     *
     * @param string $tipoMedicion
     * @return MetaProceso
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
     * Set frecuencia
     *
     * @param string $frecuencia
     * @return MetaProceso
     */
    public function setFrecuencia($frecuencia)
    {
        $this->frecuencia = $frecuencia;

        return $this;
    }

    /**
     * Get frecuencia
     *
     * @return string 
     */
    public function getFrecuencia()
    {
        return $this->frecuencia;
    }

    /**
     * Set meta
     *
     * @param float $meta
     * @return MetaProceso
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;

        return $this;
    }

    /**
     * Get meta
     *
     * @return float 
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * Set idProcesoEtapa
     *
     * @param \SisVen\SistemaBundle\Entity\ProcesoEtapa $idProcesoEtapa
     * @return MetaProceso
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

    /**
     * Set idTipoFfvv
     *
     * @param \SisVen\SistemaBundle\Entity\TipoFfvv $idTipoFfvv
     * @return MetaProceso
     */
    public function setIdTipoFfvv(\SisVen\SistemaBundle\Entity\TipoFfvv $idTipoFfvv = null)
    {
        $this->idTipoFfvv = $idTipoFfvv;

        return $this;
    }

    /**
     * Get idTipoFfvv
     *
     * @return \SisVen\SistemaBundle\Entity\TipoFfvv 
     */
    public function getIdTipoFfvv()
    {
        return $this->idTipoFfvv;
    }

    /**
     * Set idProducto
     *
     * @param \SisVen\SistemaBundle\Entity\Producto $idProducto
     * @return MetaProceso
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
     * Set periodo
     *
     * @param \SisVen\SistemaBundle\Entity\Periodo $periodo
     * @return MetaProceso
     */
    public function setPeriodo(\SisVen\SistemaBundle\Entity\Periodo $periodo = null)
    {
        $this->periodo = $periodo;

        return $this;
    }

    /**
     * Get periodo
     *
     * @return \SisVen\SistemaBundle\Entity\Periodo 
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }
}

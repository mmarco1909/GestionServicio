<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MetaVentas
 *
 * @ORM\Table(name="meta_ventas", indexes={@ORM\Index(name="fk_meta_ventas_periodo1_idx", columns={"periodo"}), @ORM\Index(name="fk_meta_ventas_usuario1_idx", columns={"id_usuario"}), @ORM\Index(name="fk_meta_ventas_producto1_idx", columns={"id_producto"}), @ORM\Index(name="fk_meta_ventas_tipo_ffvv1", columns={"id_tipo_ffvv"})})
 * @ORM\Entity
 */
class MetaVentas
{
    /**
     * @var float
     *
     * @ORM\Column(name="meta_ppto_nro", type="float", precision=10, scale=0, nullable=true)
     */
    private $metaPptoNro;

    /**
     * @var float
     *
     * @ORM\Column(name="meta_ppto_soles", type="float", precision=10, scale=0, nullable=true)
     */
    private $metaPptoSoles;

    /**
     * @var float
     *
     * @ORM\Column(name="meta_ajust_nro", type="float", precision=10, scale=0, nullable=true)
     */
    private $metaAjustNro;

    /**
     * @var float
     *
     * @ORM\Column(name="meta_ajust_soles", type="float", precision=10, scale=0, nullable=true)
     */
    private $metaAjustSoles;

    /**
     * @var \TipoFfvv
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="TipoFfvv")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_ffvv", referencedColumnName="id_tipo_ffvv")
     * })
     */
    private $idTipoFfvv;

    /**
     * @var \Periodo
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Periodo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="periodo", referencedColumnName="periodo")
     * })
     */
    private $periodo;

    /**
     * @var \Usuario
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuario;

    /**
     * @var \Producto
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Producto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_producto", referencedColumnName="id_producto")
     * })
     */
    private $idProducto;



    /**
     * Set metaPptoNro
     *
     * @param float $metaPptoNro
     * @return MetaVentas
     */
    public function setMetaPptoNro($metaPptoNro)
    {
        $this->metaPptoNro = $metaPptoNro;

        return $this;
    }

    /**
     * Get metaPptoNro
     *
     * @return float 
     */
    public function getMetaPptoNro()
    {
        return $this->metaPptoNro;
    }

    /**
     * Set metaPptoSoles
     *
     * @param float $metaPptoSoles
     * @return MetaVentas
     */
    public function setMetaPptoSoles($metaPptoSoles)
    {
        $this->metaPptoSoles = $metaPptoSoles;

        return $this;
    }

    /**
     * Get metaPptoSoles
     *
     * @return float 
     */
    public function getMetaPptoSoles()
    {
        return $this->metaPptoSoles;
    }

    /**
     * Set metaAjustNro
     *
     * @param float $metaAjustNro
     * @return MetaVentas
     */
    public function setMetaAjustNro($metaAjustNro)
    {
        $this->metaAjustNro = $metaAjustNro;

        return $this;
    }

    /**
     * Get metaAjustNro
     *
     * @return float 
     */
    public function getMetaAjustNro()
    {
        return $this->metaAjustNro;
    }

    /**
     * Set metaAjustSoles
     *
     * @param float $metaAjustSoles
     * @return MetaVentas
     */
    public function setMetaAjustSoles($metaAjustSoles)
    {
        $this->metaAjustSoles = $metaAjustSoles;

        return $this;
    }

    /**
     * Get metaAjustSoles
     *
     * @return float 
     */
    public function getMetaAjustSoles()
    {
        return $this->metaAjustSoles;
    }

    /**
     * Set idTipoFfvv
     *
     * @param \SisVen\SistemaBundle\Entity\TipoFfvv $idTipoFfvv
     * @return MetaVentas
     */
    public function setIdTipoFfvv(\SisVen\SistemaBundle\Entity\TipoFfvv $idTipoFfvv)
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
     * Set periodo
     *
     * @param \SisVen\SistemaBundle\Entity\Periodo $periodo
     * @return MetaVentas
     */
    public function setPeriodo(\SisVen\SistemaBundle\Entity\Periodo $periodo)
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

    /**
     * Set idUsuario
     *
     * @param \SisVen\SistemaBundle\Entity\Usuario $idUsuario
     * @return MetaVentas
     */
    public function setIdUsuario(\SisVen\SistemaBundle\Entity\Usuario $idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return \SisVen\SistemaBundle\Entity\Usuario 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set idProducto
     *
     * @param \SisVen\SistemaBundle\Entity\Producto $idProducto
     * @return MetaVentas
     */
    public function setIdProducto(\SisVen\SistemaBundle\Entity\Producto $idProducto)
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
}

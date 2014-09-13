<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProcesoEtapa
 *
 * @ORM\Table(name="proceso_etapa", indexes={@ORM\Index(name="fk_proceso_etapa_producto1_idx", columns={"id_producto"})})
 * @ORM\Entity
 */
class ProcesoEtapa
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_proceso_etapa", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="proceso_etapa", type="string", length=45, nullable=false)
     */
    protected $procesoEtapa;

    /**
     * @var \Producto
     *
     * @ORM\ManyToOne(targetEntity="Producto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_producto", referencedColumnName="id_producto")
     * })
     */
    protected $idProducto;

    /**
     * Override toString() method to return the name of the group
     * @return string name
     */
    public function __toString()
    {
        return (string)$this->id;
    }

    /**
     * Get idProcesoEtapa
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set procesoEtapa
     *
     * @param string $procesoEtapa
     * @return ProcesoEtapa
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
     * Set idProducto
     *
     * @param \SisVen\SistemaBundle\Entity\Producto $idProducto
     * @return ProcesoEtapa
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
}

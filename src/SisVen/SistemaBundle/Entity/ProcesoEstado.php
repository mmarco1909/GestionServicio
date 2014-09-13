<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProcesoEstado
 *
 * @ORM\Table(name="proceso_estado")
 * @ORM\Entity
 */
class ProcesoEstado
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_proceso_estado", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=45, nullable=false)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=150, nullable=true)
     */
    private $descripcion;

    /**
     * Override toString() method to return the name of the group
     * @return string name
     */
    public function __toString()
    {
        return (string)$this->id;
    }

    /**
     * Get idProcesoEstado
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return ProcesoEstado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return ProcesoEstado
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
}

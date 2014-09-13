<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstadoPlan
 *
 * @ORM\Table(name="estado_plan")
 * @ORM\Entity
 */
class EstadoPlan
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_estado_plan", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEstadoPlan;

    /**
     * @var float
     *
     * @ORM\Column(name="cump_desde", type="float", precision=10, scale=0, nullable=true)
     */
    private $cumpDesde;

    /**
     * @var float
     *
     * @ORM\Column(name="cump_hasta", type="float", precision=10, scale=0, nullable=true)
     */
    private $cumpHasta;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=45, nullable=true)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="icono", type="string", length=45, nullable=true)
     */
    private $icono;



    /**
     * Get idEstadoPlan
     *
     * @return integer 
     */
    public function getIdEstadoPlan()
    {
        return $this->idEstadoPlan;
    }

    /**
     * Set cumpDesde
     *
     * @param float $cumpDesde
     * @return EstadoPlan
     */
    public function setCumpDesde($cumpDesde)
    {
        $this->cumpDesde = $cumpDesde;

        return $this;
    }

    /**
     * Get cumpDesde
     *
     * @return float 
     */
    public function getCumpDesde()
    {
        return $this->cumpDesde;
    }

    /**
     * Set cumpHasta
     *
     * @param float $cumpHasta
     * @return EstadoPlan
     */
    public function setCumpHasta($cumpHasta)
    {
        $this->cumpHasta = $cumpHasta;

        return $this;
    }

    /**
     * Get cumpHasta
     *
     * @return float 
     */
    public function getCumpHasta()
    {
        return $this->cumpHasta;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return EstadoPlan
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
     * Set icono
     *
     * @param string $icono
     * @return EstadoPlan
     */
    public function setIcono($icono)
    {
        $this->icono = $icono;

        return $this;
    }

    /**
     * Get icono
     *
     * @return string 
     */
    public function getIcono()
    {
        return $this->icono;
    }
}

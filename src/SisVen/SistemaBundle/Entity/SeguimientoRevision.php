<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SeguimientoRevision
 *
 * @ORM\Table(name="seguimiento_revision", indexes={@ORM\Index(name="fk_seguimiento_revision_seguimiento_plan1_idx", columns={"id_seguimiento_plan"})})
 * @ORM\Entity
 */
class SeguimientoRevision
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_seguimiento_revision", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSeguimientoRevision;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string", length=200, nullable=true)
     */
    private $observacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_hora", type="datetime", nullable=false)
     */
    private $fechaHora;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=45, nullable=true)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="solicitada_accion", type="string", length=2, nullable=true)
     */
    private $solicitadaAccion;

    /**
     * @var \SeguimientoPlan
     *
     * @ORM\ManyToOne(targetEntity="SeguimientoPlan")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_seguimiento_plan", referencedColumnName="id_seguimiento_plan")
     * })
     */
    private $idSeguimientoPlan;



    /**
     * Get idSeguimientoRevision
     *
     * @return integer 
     */
    public function getIdSeguimientoRevision()
    {
        return $this->idSeguimientoRevision;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     * @return SeguimientoRevision
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
     * Set fechaHora
     *
     * @param \DateTime $fechaHora
     * @return SeguimientoRevision
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
     * Set estado
     *
     * @param string $estado
     * @return SeguimientoRevision
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
     * Set solicitadaAccion
     *
     * @param string $solicitadaAccion
     * @return SeguimientoRevision
     */
    public function setSolicitadaAccion($solicitadaAccion)
    {
        $this->solicitadaAccion = $solicitadaAccion;

        return $this;
    }

    /**
     * Get solicitadaAccion
     *
     * @return string 
     */
    public function getSolicitadaAccion()
    {
        return $this->solicitadaAccion;
    }

    /**
     * Set idSeguimientoPlan
     *
     * @param \SisVen\SistemaBundle\Entity\SeguimientoPlan $idSeguimientoPlan
     * @return SeguimientoRevision
     */
    public function setIdSeguimientoPlan(\SisVen\SistemaBundle\Entity\SeguimientoPlan $idSeguimientoPlan = null)
    {
        $this->idSeguimientoPlan = $idSeguimientoPlan;

        return $this;
    }

    /**
     * Get idSeguimientoPlan
     *
     * @return \SisVen\SistemaBundle\Entity\SeguimientoPlan 
     */
    public function getIdSeguimientoPlan()
    {
        return $this->idSeguimientoPlan;
    }
}

<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProcesoResultado
 *
 * @ORM\Table(name="proceso_resultado", indexes={@ORM\Index(name="fk_proceso_resultado_proceso_estado1_idx", columns={"id_proceso_estado"}), @ORM\Index(name="fk_proceso_resultado_proceso_accion1_idx", columns={"id_proceso_accion"}), @ORM\Index(name="fk_proceso_resultado_proceso_etapa1_idx", columns={"id_proceso_etapa"}), @ORM\Index(name="fk_proceso_resultado_proceso_etapa2_idx", columns={"id_proceso_etapa_siguiente"})})
 * @ORM\Entity
 */
class ProcesoResultado
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_proceso_resultado", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="resultado", type="string", length=100, nullable=false)
     */
    private $resultado;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=true)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="activo", type="integer", nullable=true)
     */
    private $activo;

    /**
     * @var string
     *
     * @ORM\Column(name="input", type="string", length=90, nullable=true)
     */
    private $input;

    /**
     * @var \ProcesoAccion
     *
     * @ORM\ManyToOne(targetEntity="ProcesoAccion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_proceso_accion", referencedColumnName="id_proceso_accion")
     * })
     */
    private $idProcesoAccion;

    /**
     * @var \ProcesoEstado
     *
     * @ORM\ManyToOne(targetEntity="ProcesoEstado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_proceso_estado", referencedColumnName="id_proceso_estado")
     * })
     */
    private $idProcesoEstado;

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
     * @var \ProcesoEtapa
     *
     * @ORM\ManyToOne(targetEntity="ProcesoEtapa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_proceso_etapa_siguiente", referencedColumnName="id_proceso_etapa")
     * })
     */
    private $idProcesoEtapaSiguiente;


    /**
     * Override toString() method to return the name of the group
     * @return string name
     */
    public function __toString()
    {
        return $this->id;
    }

    /**
     * Get idProcesoResultado
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set resultado
     *
     * @param string $resultado
     * @return ProcesoResultado
     */
    public function setResultado($resultado)
    {
        $this->resultado = $resultado;

        return $this;
    }

    /**
     * Get resultado
     *
     * @return string 
     */
    public function getResultado()
    {
        return $this->resultado;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return ProcesoResultado
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

    /**
     * Set activo
     *
     * @param integer $activo
     * @return ProcesoResultado
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return integer 
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set input
     *
     * @param string $input
     * @return ProcesoResultado
     */
    public function setInput($input)
    {
        $this->input = $input;

        return $this;
    }

    /**
     * Get input
     *
     * @return string 
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * Set idProcesoAccion
     *
     * @param \SisVen\SistemaBundle\Entity\ProcesoAccion $idProcesoAccion
     * @return ProcesoResultado
     */
    public function setIdProcesoAccion(\SisVen\SistemaBundle\Entity\ProcesoAccion $idProcesoAccion = null)
    {
        $this->idProcesoAccion = $idProcesoAccion;

        return $this;
    }

    /**
     * Get idProcesoAccion
     *
     * @return \SisVen\SistemaBundle\Entity\ProcesoAccion 
     */
    public function getIdProcesoAccion()
    {
        return $this->idProcesoAccion;
    }

    /**
     * Set idProcesoEstado
     *
     * @param \SisVen\SistemaBundle\Entity\ProcesoEstado $idProcesoEstado
     * @return ProcesoResultado
     */
    public function setIdProcesoEstado(\SisVen\SistemaBundle\Entity\ProcesoEstado $idProcesoEstado = null)
    {
        $this->idProcesoEstado = $idProcesoEstado;

        return $this;
    }

    /**
     * Get idProcesoEstado
     *
     * @return \SisVen\SistemaBundle\Entity\ProcesoEstado 
     */
    public function getIdProcesoEstado()
    {
        return $this->idProcesoEstado;
    }

    /**
     * Set idProcesoEtapa
     *
     * @param \SisVen\SistemaBundle\Entity\ProcesoEtapa $idProcesoEtapa
     * @return ProcesoResultado
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
     * Set idProcesoEtapaSiguiente
     *
     * @param \SisVen\SistemaBundle\Entity\ProcesoEtapa $idProcesoEtapaSiguiente
     * @return ProcesoResultado
     */
    public function setIdProcesoEtapaSiguiente(\SisVen\SistemaBundle\Entity\ProcesoEtapa $idProcesoEtapaSiguiente = null)
    {
        $this->idProcesoEtapaSiguiente = $idProcesoEtapaSiguiente;

        return $this;
    }

    /**
     * Get idProcesoEtapaSiguiente
     *
     * @return \SisVen\SistemaBundle\Entity\ProcesoEtapa 
     */
    public function getIdProcesoEtapaSiguiente()
    {
        return $this->idProcesoEtapaSiguiente;
    }
}

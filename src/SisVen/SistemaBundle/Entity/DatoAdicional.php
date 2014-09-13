<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DatoAdicional
 *
 * @ORM\Table(name="dato_adicional", indexes={@ORM\Index(name="fk_dato_adicional_proceso_resultado1_idx", columns={"id_proceso_resultado"})})
 * @ORM\Entity
 */
class DatoAdicional
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_dato_adicional", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDatoAdicional;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=45, nullable=true)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=45, nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="permite_nulo", type="string", length=45, nullable=true)
     */
    private $permiteNulo;

    /**
     * @var integer
     *
     * @ORM\Column(name="activo", type="integer", nullable=true)
     */
    private $activo;

    /**
     * @var \ProcesoResultado
     *
     * @ORM\ManyToOne(targetEntity="ProcesoResultado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_proceso_resultado", referencedColumnName="id_proceso_resultado")
     * })
     */
    private $idProcesoResultado;



    /**
     * Get idDatoAdicional
     *
     * @return integer 
     */
    public function getIdDatoAdicional()
    {
        return $this->idDatoAdicional;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     * @return DatoAdicional
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return DatoAdicional
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set permiteNulo
     *
     * @param string $permiteNulo
     * @return DatoAdicional
     */
    public function setPermiteNulo($permiteNulo)
    {
        $this->permiteNulo = $permiteNulo;

        return $this;
    }

    /**
     * Get permiteNulo
     *
     * @return string 
     */
    public function getPermiteNulo()
    {
        return $this->permiteNulo;
    }

    /**
     * Set activo
     *
     * @param integer $activo
     * @return DatoAdicional
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
     * Set idProcesoResultado
     *
     * @param \SisVen\SistemaBundle\Entity\ProcesoResultado $idProcesoResultado
     * @return DatoAdicional
     */
    public function setIdProcesoResultado(\SisVen\SistemaBundle\Entity\ProcesoResultado $idProcesoResultado = null)
    {
        $this->idProcesoResultado = $idProcesoResultado;

        return $this;
    }

    /**
     * Get idProcesoResultado
     *
     * @return \SisVen\SistemaBundle\Entity\ProcesoResultado 
     */
    public function getIdProcesoResultado()
    {
        return $this->idProcesoResultado;
    }
}

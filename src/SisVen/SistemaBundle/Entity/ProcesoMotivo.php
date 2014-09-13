<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProcesoMotivo
 *
 * @ORM\Table(name="proceso_motivo", indexes={@ORM\Index(name="fk_proceso_motivo_proceso_resultado1_idx", columns={"id_proceso_resultado"})})
 * @ORM\Entity
 */
class ProcesoMotivo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_motivo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="motivo", type="string", length=45, nullable=false)
     */
    private $motivo;

    /**
     * @var string
     *
     * @ORM\Column(name="comentario", type="string", length=250, nullable=true)
     */
    private $comentario;

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
     * Get idMotivo
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set motivo
     *
     * @param string $motivo
     * @return ProcesoMotivo
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;

        return $this;
    }

    /**
     * Get motivo
     *
     * @return string 
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * Set comentario
     *
     * @param string $comentario
     * @return ProcesoMotivo
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;

        return $this;
    }

    /**
     * Get comentario
     *
     * @return string 
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Set activo
     *
     * @param integer $activo
     * @return ProcesoMotivo
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
     * @return ProcesoMotivo
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

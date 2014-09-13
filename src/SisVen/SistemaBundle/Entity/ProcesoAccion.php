<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProcesoAccion
 *
 * @ORM\Table(name="proceso_accion", indexes={@ORM\Index(name="fk_proceso_accion_proceso_etapa1_idx", columns={"id_proceso_etapa"})})
 * @ORM\Entity
 */
class ProcesoAccion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_proceso_accion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="accion", type="string", length=45, nullable=false)
     */
    private $accion;

    /**
     * @var integer
     *
     * @ORM\Column(name="activo", type="integer", nullable=true)
     */
    private $activo;

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
     * Get idProcesoAccion
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set accion
     *
     * @param string $accion
     * @return ProcesoAccion
     */
    public function setAccion($accion)
    {
        $this->accion = $accion;

        return $this;
    }

    /**
     * Get accion
     *
     * @return string 
     */
    public function getAccion()
    {
        return $this->accion;
    }

    /**
     * Set activo
     *
     * @param integer $activo
     * @return ProcesoAccion
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
     * Set idProcesoEtapa
     *
     * @param \SisVen\SistemaBundle\Entity\ProcesoEtapa $idProcesoEtapa
     * @return ProcesoAccion
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

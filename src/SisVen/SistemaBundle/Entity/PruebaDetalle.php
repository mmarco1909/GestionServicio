<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PruebaDetalle
 *
 * @ORM\Table(name="prueba_detalle", indexes={@ORM\Index(name="fk_prueba_detalle_tabla_prueba1_idx", columns={"idtabla"})})
 * @ORM\Entity
 */
class PruebaDetalle
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_detalle", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDetalle;

    /**
     * @var string
     *
     * @ORM\Column(name="detalle", type="string", length=45, nullable=true)
     */
    private $detalle;

    /**
     * @var \TablaPrueba
     *
     * @ORM\ManyToOne(targetEntity="TablaPrueba")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idtabla", referencedColumnName="idtabla")
     * })
     */
    private $idtabla;



    /**
     * Get idDetalle
     *
     * @return integer 
     */
    public function getIdDetalle()
    {
        return $this->idDetalle;
    }

    /**
     * Set detalle
     *
     * @param string $detalle
     * @return PruebaDetalle
     */
    public function setDetalle($detalle)
    {
        $this->detalle = $detalle;

        return $this;
    }

    /**
     * Get detalle
     *
     * @return string 
     */
    public function getDetalle()
    {
        return $this->detalle;
    }

    /**
     * Set idtabla
     *
     * @param \SisVen\SistemaBundle\Entity\TablaPrueba $idtabla
     * @return PruebaDetalle
     */
    public function setIdtabla(\SisVen\SistemaBundle\Entity\TablaPrueba $idtabla = null)
    {
        $this->idtabla = $idtabla;

        return $this;
    }

    /**
     * Get idtabla
     *
     * @return \SisVen\SistemaBundle\Entity\TablaPrueba 
     */
    public function getIdtabla()
    {
        return $this->idtabla;
    }
}

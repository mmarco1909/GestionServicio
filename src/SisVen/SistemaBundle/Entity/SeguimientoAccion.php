<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SeguimientoAccion
 *
 * @ORM\Table(name="seguimiento_accion")
 * @ORM\Entity
 */
class SeguimientoAccion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_seguimiento_accion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSeguimientoAccion;

    /**
     * @var string
     *
     * @ORM\Column(name="seguimiento_accion", type="string", length=100, nullable=false)
     */
    private $seguimientoAccion;



    /**
     * Get idSeguimientoAccion
     *
     * @return integer 
     */
    public function getIdSeguimientoAccion()
    {
        return $this->idSeguimientoAccion;
    }

    /**
     * Set seguimientoAccion
     *
     * @param string $seguimientoAccion
     * @return SeguimientoAccion
     */
    public function setSeguimientoAccion($seguimientoAccion)
    {
        $this->seguimientoAccion = $seguimientoAccion;

        return $this;
    }

    /**
     * Get seguimientoAccion
     *
     * @return string 
     */
    public function getSeguimientoAccion()
    {
        return $this->seguimientoAccion;
    }
}

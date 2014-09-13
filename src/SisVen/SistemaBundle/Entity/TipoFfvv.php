<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoFfvv
 *
 * @ORM\Table(name="tipo_ffvv")
 * @ORM\Entity
 */
class TipoFfvv
{
    /**
     * @var string
     *
     * @ORM\Column(name="id_tipo_ffvv", type="string", length=10, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_ffvv", type="string", length=45, nullable=false)
     */
    protected $tipoFfvv;

    public function __toString()
    {
        return $this->id;
    }

    /**
     * Get idTipoFfvv
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tipoFfvv
     *
     * @param string $tipoFfvv
     * @return TipoFfvv
     */
    public function setTipoFfvv($tipoFfvv)
    {
        $this->tipoFfvv = $tipoFfvv;

        return $this;
    }

    /**
     * Get tipoFfvv
     *
     * @return string 
     */
    public function getTipoFfvv()
    {
        return $this->tipoFfvv;
    }
}

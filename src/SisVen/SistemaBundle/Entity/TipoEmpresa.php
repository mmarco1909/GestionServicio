<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoEmpresa
 *
 * @ORM\Table(name="tipo_empresa")
 * @ORM\Entity
 */
class TipoEmpresa
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_tipo_empresa", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTipoEmpresa;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_empresa", type="string", length=10, nullable=false)
     */
    private $tipoEmpresa;

    /**
     * @var float
     *
     * @ORM\Column(name="ram_corte", type="float", precision=10, scale=0, nullable=true)
     */
    private $ramCorte;

    /**
     * @var float
     *
     * @ORM\Column(name="nro_inicial", type="float", precision=10, scale=0, nullable=true)
     */
    private $nroInicial;

    /**
     * @var float
     *
     * @ORM\Column(name="nro_final", type="float", precision=10, scale=0, nullable=true)
     */
    private $nroFinal;



    /**
     * Get idTipoEmpresa
     *
     * @return integer 
     */
    public function getIdTipoEmpresa()
    {
        return $this->idTipoEmpresa;
    }

    /**
     * Set tipoEmpresa
     *
     * @param string $tipoEmpresa
     * @return TipoEmpresa
     */
    public function setTipoEmpresa($tipoEmpresa)
    {
        $this->tipoEmpresa = $tipoEmpresa;

        return $this;
    }

    /**
     * Get tipoEmpresa
     *
     * @return string 
     */
    public function getTipoEmpresa()
    {
        return $this->tipoEmpresa;
    }

    /**
     * Set ramCorte
     *
     * @param float $ramCorte
     * @return TipoEmpresa
     */
    public function setRamCorte($ramCorte)
    {
        $this->ramCorte = $ramCorte;

        return $this;
    }

    /**
     * Get ramCorte
     *
     * @return float 
     */
    public function getRamCorte()
    {
        return $this->ramCorte;
    }

    /**
     * Set nroInicial
     *
     * @param float $nroInicial
     * @return TipoEmpresa
     */
    public function setNroInicial($nroInicial)
    {
        $this->nroInicial = $nroInicial;

        return $this;
    }

    /**
     * Get nroInicial
     *
     * @return float 
     */
    public function getNroInicial()
    {
        return $this->nroInicial;
    }

    /**
     * Set nroFinal
     *
     * @param float $nroFinal
     * @return TipoEmpresa
     */
    public function setNroFinal($nroFinal)
    {
        $this->nroFinal = $nroFinal;

        return $this;
    }

    /**
     * Get nroFinal
     *
     * @return float 
     */
    public function getNroFinal()
    {
        return $this->nroFinal;
    }
}

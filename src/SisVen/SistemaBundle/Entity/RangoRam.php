<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RangoRam
 *
 * @ORM\Table(name="rango_ram")
 * @ORM\Entity(repositoryClass="SisVen\SistemaBundle\Entity\RangoRamRepository")
 */
class RangoRam
{
    /**
     * @var string
     *
     * @ORM\Column(name="rango_ram", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rangoRam;

    /**
     * @var float
     *
     * @ORM\Column(name="ram_ini", type="float", precision=10, scale=0, nullable=false)
     */
    private $ramIni;

    /**
     * @var float
     *
     * @ORM\Column(name="ram_fin", type="float", precision=10, scale=0, nullable=false)
     */
    private $ramFin;

    /**
     * @var string
     *
     * @ORM\Column(name="murcielago", type="string", length=5, nullable=false)
     */
    private $murcielago;



    /**
     * Get rangoRam
     *
     * @return string 
     */
    public function getRangoRam()
    {
        return $this->rangoRam;
    }

    /**
     * Set ramIni
     *
     * @param float $ramIni
     * @return RangoRam
     */
    public function setRamIni($ramIni)
    {
        $this->ramIni = $ramIni;

        return $this;
    }

    /**
     * Get ramIni
     *
     * @return float 
     */
    public function getRamIni()
    {
        return $this->ramIni;
    }

    /**
     * Set ramFin
     *
     * @param float $ramFin
     * @return RangoRam
     */
    public function setRamFin($ramFin)
    {
        $this->ramFin = $ramFin;

        return $this;
    }

    /**
     * Get ramFin
     *
     * @return float 
     */
    public function getRamFin()
    {
        return $this->ramFin;
    }

    /**
     * Set murcielago
     *
     * @param string $murcielago
     * @return RangoRam
     */
    public function setMurcielago($murcielago)
    {
        $this->murcielago = $murcielago;

        return $this;
    }

    /**
     * Get murcielago
     *
     * @return string 
     */
    public function getMurcielago()
    {
        return $this->murcielago;
    }
}

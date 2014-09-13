<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Periodo
 *
 * @ORM\Table(name="periodo")
 * @ORM\Entity(repositoryClass="SisVen\SistemaBundle\Entity\PeriodoRepository")
 */
class Periodo
{
    /**
     * @var string
     *
     * @ORM\Column(name="periodo", type="string", length=6, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="anio", type="string", length=4, nullable=false)
     */
    private $anio;

    /**
     * @var string
     *
     * @ORM\Column(name="mes", type="string", length=2, nullable=false)
     */
    private $mes;

    /**
     * @var integer
     *
     * @ORM\Column(name="dias_laborables", type="integer", nullable=false)
     */
    private $diasLaborables;



    /**
     * Get periodo
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set anio
     *
     * @param string $anio
     * @return Periodo
     */
    public function setAnio($anio)
    {
        $this->anio = $anio;

        return $this;
    }

    /**
     * Get anio
     *
     * @return string 
     */
    public function getAnio()
    {
        return $this->anio;
    }

    /**
     * Set mes
     *
     * @param string $mes
     * @return Periodo
     */
    public function setMes($mes)
    {
        $this->mes = $mes;

        return $this;
    }

    /**
     * Get mes
     *
     * @return string 
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Set diasLaborables
     *
     * @param integer $diasLaborables
     * @return Periodo
     */
    public function setDiasLaborables($diasLaborables)
    {
        $this->diasLaborables = $diasLaborables;

        return $this;
    }

    /**
     * Get diasLaborables
     *
     * @return integer 
     */
    public function getDiasLaborables()
    {
        return $this->diasLaborables;
    }
}

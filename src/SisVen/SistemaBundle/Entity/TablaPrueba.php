<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TablaPrueba
 *
 * @ORM\Table(name="tabla_prueba")
 * @ORM\Entity
 */
class TablaPrueba
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idtabla", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtabla;

    /**
     * @var string
     *
     * @ORM\Column(name="dato_string", type="string", length=45, nullable=true)
     */
    private $datoString;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dato_date", type="datetime", nullable=true)
     */
    private $datoDate;

    /**
     * @var float
     *
     * @ORM\Column(name="dato_double", type="float", precision=10, scale=0, nullable=true)
     */
    private $datoDouble;



    /**
     * Get idtabla
     *
     * @return integer 
     */
    public function getIdtabla()
    {
        return $this->idtabla;
    }

    /**
     * Set datoString
     *
     * @param string $datoString
     * @return TablaPrueba
     */
    public function setDatoString($datoString)
    {
        $this->datoString = $datoString;

        return $this;
    }

    /**
     * Get datoString
     *
     * @return string 
     */
    public function getDatoString()
    {
        return $this->datoString;
    }

    /**
     * Set datoDate
     *
     * @param \DateTime $datoDate
     * @return TablaPrueba
     */
    public function setDatoDate($datoDate)
    {
        $this->datoDate = $datoDate;

        return $this;
    }

    /**
     * Get datoDate
     *
     * @return \DateTime 
     */
    public function getDatoDate()
    {
        return $this->datoDate;
    }

    /**
     * Set datoDouble
     *
     * @param float $datoDouble
     * @return TablaPrueba
     */
    public function setDatoDouble($datoDouble)
    {
        $this->datoDouble = $datoDouble;

        return $this;
    }

    /**
     * Get datoDouble
     *
     * @return float 
     */
    public function getDatoDouble()
    {
        return $this->datoDouble;
    }
}

<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProduccionApv
 *
 * @ORM\Table(name="produccion_apv")
 * @ORM\Entity(repositoryClass="SisVen\SistemaBundle\Entity\ProduccionApvRepository")
 */
class ProduccionApv
{

    /**
     * @var string
     *
     * @ORM\Column(name="id_usuario", type="string", length=20, nullable=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idUsuario;

    /**
     * @var float
     *
     * @ORM\Column(name="monto_apv", type="float", precision=10, scale=0, nullable=true)
     */
    private $montoApv;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_apv", type="datetime", nullable=true)
     */
    private $fechaApv;

    /**
     * @var string
     *
     * @ORM\Column(name="cuspp", type="string", length=20, nullable=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cuspp;

    /**
     * @var string
     *
     * @ORM\Column(name="primer_nm", type="string", length=45, nullable=true)
     */
    private $primerNm;

    /**
     * @var string
     *
     * @ORM\Column(name="segundo_nm", type="string", length=45, nullable=true)
     */
    private $segundoNm;

    /**
     * @var string
     *
     * @ORM\Column(name="primer_ap", type="string", length=45, nullable=true)
     */
    private $primerAp;

    /**
     * @var string
     *
     * @ORM\Column(name="segundo_ap", type="string", length=45, nullable=true)
     */
    private $segundoAp;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_aporte", type="string", length=45, nullable=true)
     */
    private $tipoAporte;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_registro", type="datetime", nullable=true)
     */
    private $fechaRegistro;



    /**
     * Set idUsuario
     *
     * @param string $idUsuario
     * @return ProduccionApv
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    
        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return string 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set montoApv
     *
     * @param float $montoApv
     * @return ProduccionApv
     */
    public function setMontoApv($montoApv)
    {
        $this->montoApv = $montoApv;
    
        return $this;
    }

    /**
     * Get montoApv
     *
     * @return float 
     */
    public function getMontoApv()
    {
        return $this->montoApv;
    }

    /**
     * Set fechaApv
     *
     * @param \DateTime $fechaApv
     * @return ProduccionApv
     */
    public function setFechaApv($fechaApv)
    {
        $this->fechaApv = $fechaApv;
    
        return $this;
    }

    /**
     * Get fechaApv
     *
     * @return \DateTime 
     */
    public function getFechaApv()
    {
        return $this->fechaApv;
    }

    /**
     * Set cuspp
     *
     * @param string $cuspp
     * @return ProduccionApv
     */
    public function setCuspp($cuspp)
    {
        $this->cuspp = $cuspp;
    
        return $this;
    }

    /**
     * Get cuspp
     *
     * @return string 
     */
    public function getCuspp()
    {
        return $this->cuspp;
    }

    /**
     * Set primerNm
     *
     * @param string $primerNm
     * @return ProduccionApv
     */
    public function setPrimerNm($primerNm)
    {
        $this->primerNm = $primerNm;
    
        return $this;
    }

    /**
     * Get primerNm
     *
     * @return string 
     */
    public function getPrimerNm()
    {
        return $this->primerNm;
    }

    /**
     * Set segundoNm
     *
     * @param string $segundoNm
     * @return ProduccionApv
     */
    public function setSegundoNm($segundoNm)
    {
        $this->segundoNm = $segundoNm;
    
        return $this;
    }

    /**
     * Get segundoNm
     *
     * @return string 
     */
    public function getSegundoNm()
    {
        return $this->segundoNm;
    }

    /**
     * Set primerAp
     *
     * @param string $primerAp
     * @return ProduccionApv
     */
    public function setPrimerAp($primerAp)
    {
        $this->primerAp = $primerAp;
    
        return $this;
    }

    /**
     * Get primerAp
     *
     * @return string 
     */
    public function getPrimerAp()
    {
        return $this->primerAp;
    }

    /**
     * Set segundoAp
     *
     * @param string $segundoAp
     * @return ProduccionApv
     */
    public function setSegundoAp($segundoAp)
    {
        $this->segundoAp = $segundoAp;
    
        return $this;
    }

    /**
     * Get segundoAp
     *
     * @return string 
     */
    public function getSegundoAp()
    {
        return $this->segundoAp;
    }

    /**
     * Set tipoAporte
     *
     * @param string $tipoAporte
     * @return ProduccionApv
     */
    public function setTipoAporte($tipoAporte)
    {
        $this->tipoAporte = $tipoAporte;
    
        return $this;
    }

    /**
     * Get tipoAporte
     *
     * @return string 
     */
    public function getTipoAporte()
    {
        return $this->tipoAporte;
    }

    /**
     * Set fechaRegistro
     *
     * @param \DateTime $fechaRegistro
     * @return ProduccionApv
     */
    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;
    
        return $this;
    }

    /**
     * Get fechaRegistro
     *
     * @return \DateTime 
     */
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }
}

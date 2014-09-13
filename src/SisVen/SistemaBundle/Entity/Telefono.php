<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Telefono
 *
 * @ORM\Table(name="telefono")
 * @ORM\Entity(repositoryClass="SisVen\SistemaBundle\Entity\TelefonoRepository")
 */
class Telefono
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_telefono", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=45, nullable=false)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="anexo", type="string", length=45, nullable=true)
     */
    private $anexo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_alta", type="datetime", nullable=false)
     */
    private $fechaAlta;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_telefono", type="string", length=45, nullable=true)
     */
    private $tipoTelefono;

    /**
     * @var string
     *
     * @ORM\Column(name="cuspp", type="string", length=20, nullable=true)
     */
    private $cuspp;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=45, nullable=true)
     */
    private $estado;

    /**
     * Get idTelefono
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * Set numero
     *
     * @param string $numero
     * @return Telefono
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set anexo
     *
     * @param string $anexo
     * @return Telefono
     */
    public function setAnexo($anexo)
    {
        $this->anexo = $anexo;

        return $this;
    }

    /**
     * Get anexo
     *
     * @return string 
     */
    public function getAnexo()
    {
        return $this->anexo;
    }

    /**
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     * @return Telefono
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime 
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * Set tipoTelefono
     *
     * @param string $tipoTelefono
     * @return Telefono
     */
    public function setTipoTelefono($tipoTelefono)
    {
        $this->tipoTelefono = $tipoTelefono;

        return $this;
    }

    /**
     * Get tipoTelefono
     *
     * @return string 
     */
    public function getTipoTelefono()
    {
        return $this->tipoTelefono;
    }

    /**
     * Set cuspp
     *
     * @param string $cuspp
     * @return Telefono
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
     * Set estado
     *
     * @param string $estado
     * @return Telefono
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }
}

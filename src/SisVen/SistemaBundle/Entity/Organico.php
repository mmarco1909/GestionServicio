<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Organico
 *
 * @ORM\Table(name="organico", indexes={@ORM\Index(name="fk_organico_usuario1_idx", columns={"id_usuario"}), @ORM\Index(name="fk_organico_periodo1_idx", columns={"periodo"}), @ORM\Index(name="fk_organico_tipo_ffvv1", columns={"id_tipo_ffvv"})})
 * @ORM\Entity
 */
class Organico
{
    /**
     * @var integer
     *
     * @ORM\Column(name="organico_ppto", type="integer", nullable=false)
     */
    private $organicoPpto;

    /**
     * @var integer
     *
     * @ORM\Column(name="organico_real", type="integer", nullable=false)
     */
    private $organicoReal;

    /**
     * @var \TipoFfvv
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="TipoFfvv")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_ffvv", referencedColumnName="id_tipo_ffvv")
     * })
     */
    private $idTipoFfvv;

    /**
     * @var \Usuario
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuario;

    /**
     * @var \Periodo
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Periodo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="periodo", referencedColumnName="periodo")
     * })
     */
    private $periodo;



    /**
     * Set organicoPpto
     *
     * @param integer $organicoPpto
     * @return Organico
     */
    public function setOrganicoPpto($organicoPpto)
    {
        $this->organicoPpto = $organicoPpto;

        return $this;
    }

    /**
     * Get organicoPpto
     *
     * @return integer 
     */
    public function getOrganicoPpto()
    {
        return $this->organicoPpto;
    }

    /**
     * Set organicoReal
     *
     * @param integer $organicoReal
     * @return Organico
     */
    public function setOrganicoReal($organicoReal)
    {
        $this->organicoReal = $organicoReal;

        return $this;
    }

    /**
     * Get organicoReal
     *
     * @return integer 
     */
    public function getOrganicoReal()
    {
        return $this->organicoReal;
    }

    /**
     * Set idTipoFfvv
     *
     * @param \SisVen\SistemaBundle\Entity\TipoFfvv $idTipoFfvv
     * @return Organico
     */
    public function setIdTipoFfvv(\SisVen\SistemaBundle\Entity\TipoFfvv $idTipoFfvv)
    {
        $this->idTipoFfvv = $idTipoFfvv;

        return $this;
    }

    /**
     * Get idTipoFfvv
     *
     * @return \SisVen\SistemaBundle\Entity\TipoFfvv 
     */
    public function getIdTipoFfvv()
    {
        return $this->idTipoFfvv;
    }

    /**
     * Set idUsuario
     *
     * @param \SisVen\SistemaBundle\Entity\Usuario $idUsuario
     * @return Organico
     */
    public function setIdUsuario(\SisVen\SistemaBundle\Entity\Usuario $idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return \SisVen\SistemaBundle\Entity\Usuario 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set periodo
     *
     * @param \SisVen\SistemaBundle\Entity\Periodo $periodo
     * @return Organico
     */
    public function setPeriodo(\SisVen\SistemaBundle\Entity\Periodo $periodo)
    {
        $this->periodo = $periodo;

        return $this;
    }

    /**
     * Get periodo
     *
     * @return \SisVen\SistemaBundle\Entity\Periodo 
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }
}

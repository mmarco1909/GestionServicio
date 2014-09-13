<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReporteSupervisor
 *
 * @ORM\Table(name="reporte_supervisor")
 * @ORM\Entity(repositoryClass="SisVen\SistemaBundle\Entity\ReporteSupervisorRepository")
 */
class ReporteSupervisor
{
    /**
     * @var string
     *
     * @ORM\Column(name="mat_ase", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $matAse;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_ase", type="string", length=45, nullable=true)
     */
    private $nomAse;

    /**
     * @var integer
     *
     * @ORM\Column(name="prospectos", type="integer", nullable=true)
     */
    private $prospectos;

    /**
     * @var integer
     *
     * @ORM\Column(name="seleccionados", type="integer", nullable=true)
     */
    private $seleccionados;

    /**
     * @var integer
     *
     * @ORM\Column(name="visitas", type="integer", nullable=true)
     */
    private $visitas;

    /**
     * @var integer
     *
     * @ORM\Column(name="cierres", type="integer", nullable=true)
     */
    private $cierres;

    /**
     * @var float
     *
     * @ORM\Column(name="ram", type="float", precision=10, scale=0, nullable=true)
     */
    private $ram;

    /**
     * @var float
     *
     * @ORM\Column(name="meta", type="float", precision=10, scale=0, nullable=true)
     */
    private $meta;

    /**
     * @var float
     *
     * @ORM\Column(name="avance", type="float", precision=10, scale=0, nullable=true)
     */
    private $avance;



    /**
     * Get matAse
     *
     * @return string 
     */
    public function getMatAse()
    {
        return $this->matAse;
    }

    /**
     * Set nomAse
     *
     * @param string $nomAse
     * @return ReporteSupervisor
     */
    public function setNomAse($nomAse)
    {
        $this->nomAse = $nomAse;
    
        return $this;
    }

    /**
     * Get nomAse
     *
     * @return string 
     */
    public function getNomAse()
    {
        return $this->nomAse;
    }

    /**
     * Set prospectos
     *
     * @param integer $prospectos
     * @return ReporteSupervisor
     */
    public function setProspectos($prospectos)
    {
        $this->prospectos = $prospectos;
    
        return $this;
    }

    /**
     * Get prospectos
     *
     * @return integer 
     */
    public function getProspectos()
    {
        return $this->prospectos;
    }

    /**
     * Set seleccionados
     *
     * @param integer $seleccionados
     * @return ReporteSupervisor
     */
    public function setSeleccionados($seleccionados)
    {
        $this->seleccionados = $seleccionados;
    
        return $this;
    }

    /**
     * Get seleccionados
     *
     * @return integer 
     */
    public function getSeleccionados()
    {
        return $this->seleccionados;
    }

    /**
     * Set visitas
     *
     * @param integer $visitas
     * @return ReporteSupervisor
     */
    public function setVisitas($visitas)
    {
        $this->visitas = $visitas;
    
        return $this;
    }

    /**
     * Get visitas
     *
     * @return integer 
     */
    public function getVisitas()
    {
        return $this->visitas;
    }

    /**
     * Set cierres
     *
     * @param integer $cierres
     * @return ReporteSupervisor
     */
    public function setCierres($cierres)
    {
        $this->cierres = $cierres;
    
        return $this;
    }

    /**
     * Get cierres
     *
     * @return integer 
     */
    public function getCierres()
    {
        return $this->cierres;
    }

    /**
     * Set ram
     *
     * @param float $ram
     * @return ReporteSupervisor
     */
    public function setRam($ram)
    {
        $this->ram = $ram;
    
        return $this;
    }

    /**
     * Get ram
     *
     * @return float 
     */
    public function getRam()
    {
        return $this->ram;
    }

    /**
     * Set meta
     *
     * @param float $meta
     * @return ReporteSupervisor
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;
    
        return $this;
    }

    /**
     * Get meta
     *
     * @return float 
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * Set avance
     *
     * @param float $avance
     * @return ReporteSupervisor
     */
    public function setAvance($avance)
    {
        $this->avance = $avance;
    
        return $this;
    }

    /**
     * Get avance
     *
     * @return float 
     */
    public function getAvance()
    {
        return $this->avance;
    }
}

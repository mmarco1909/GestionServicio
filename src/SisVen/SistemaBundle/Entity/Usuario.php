<?php

namespace SisVen\SistemaBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", indexes={@ORM\Index(name="fk_usuario_rol1_idx", columns={"id_rol"}), @ORM\Index(name="fk_usuario_tipo_ffvv1_idx", columns={"id_tipo_ffvv"}), @ORM\Index(name="fk_usuario_usuario1_idx", columns={"id_usuario_lider"})})
 * @ORM\Entity(repositoryClass="SisVen\SistemaBundle\Entity\UsuarioRepository")
 */
class Usuario implements UserInterface
{
    function eraseCredentials()
    {
    }
    
    function getRoles()
    {
        return array('ROLE_ASESOR');
        //return array($this->idRol);
    }
    
    function getUsername()
    {
        return $this->getId();
    }
    
    /**
     * @var string
     *
     * @ORM\Column(name="id_usuario", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=16, nullable=false)
     */
    protected $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="primer_ap", type="string", length=45, nullable=false)
     */
    protected $primerAp;

    /**
     * @var string
     *
     * @ORM\Column(name="segundo_ap", type="string", length=45, nullable=true)
     */
    protected $segundoAp;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=32, nullable=false)
     */
    protected $password;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_alta", type="datetime", nullable=false)
     */
    protected $fechaAlta;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=100, nullable=true)
     */
    protected $salt;

	/**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario_lider", referencedColumnName="id_usuario")
     * })
     */
    protected $idUsuarioLider;

    /**
     * @var \Rol
     *
     * @ORM\ManyToOne(targetEntity="Rol")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_rol", referencedColumnName="id_rol")
     * })
     */
    protected $idRol;

    /**
     * @var \TipoFfvv
     *
     * @ORM\ManyToOne(targetEntity="TipoFfvv")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_ffvv", referencedColumnName="id_tipo_ffvv")
     * })
     */
    protected $idTipoFfvv;

    /**
     * Override toString() method to return the name of the group
     * @return string name
     */
    public function __toString()
    {
        return $this->id;
    }
    
    /**
     * Set id
     *
     * @param string $valor
     * @return Entidad
     */
    public function setId($valor)
    {
        $this->id = $valor;    
        return $this;
    }
    
    /**
     * Get idUsuario
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }
   
    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set primerAp
     *
     * @param string $primerAp
     * @return Usuario
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
     * @return Usuario
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
     * Set email
     *
     * @param string $email
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     * @return Usuario
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
     * Set salt
     *
     * @param string $salt
     * @return Usuario
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set idUsuarioLider
     *
     * @param \SisVen\SistemaBundle\Entity\Usuario $idUsuarioLider
     * @return Usuario
     */
    public function setIdUsuarioLider(\SisVen\SistemaBundle\Entity\Usuario $idUsuarioLider = null)
    {
        $this->idUsuarioLider = $idUsuarioLider;

        return $this;
    }

    /**
     * Get idUsuarioLider
     *
     * @return \SisVen\SistemaBundle\Entity\Usuario 
     */
    public function getIdUsuarioLider()
    {
        return $this->idUsuarioLider;
    }

    /**
     * Set idRol
     *
     * @param \SisVen\SistemaBundle\Entity\Rol $idRol
     * @return Usuario
     */
    public function setIdRol(\SisVen\SistemaBundle\Entity\Rol $idRol = null)
    {
        $this->idRol = $idRol;

        return $this;
    }

    /**
     * Get idRol
     *
     * @return \SisVen\SistemaBundle\Entity\Rol 
     */
    public function getIdRol()
    {
        return $this->idRol;
    }

    /**
     * Set idTipoFfvv
     *
     * @param \SisVen\SistemaBundle\Entity\TipoFfvv $idTipoFfvv
     * @return Usuario
     */
    public function setIdTipoFfvv(\SisVen\SistemaBundle\Entity\TipoFfvv $idTipoFfvv = null)
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




}

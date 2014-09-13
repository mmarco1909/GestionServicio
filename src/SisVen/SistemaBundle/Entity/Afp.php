<?php

namespace SisVen\SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Afp
 *
 * @ORM\Table(name="afp")
 * @ORM\Entity
 */
class Afp
{
    /**
     * @var string
     *
     * @ORM\Column(name="id_afp", type="string", length=10, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="afp", type="string", length=10, nullable=false)
     */
    private $afp;



    /**
     * Get idAfp
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set afp
     *
     * @param string $afp
     * @return Afp
     */
    public function setAfp($afp)
    {
        $this->afp = $afp;

        return $this;
    }

    /**
     * Get afp
     *
     * @return string 
     */
    public function getAfp()
    {
        return $this->afp;
    }
}

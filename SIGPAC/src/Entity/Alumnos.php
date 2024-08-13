<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alumnos
 *
 * @ORM\Table(name="alumnos")
 * @ORM\Entity
 */
class Alumnos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_alu", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAlu;

    /**
     * @var string
     *
     * @ORM\Column(name="curp", type="string", length=18, nullable=false)
     */
    private $curp;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_alu", type="string", length=50, nullable=false)
     */
    private $nomAlu;

    /**
     * @var string
     *
     * @ORM\Column(name="pri_ape", type="string", length=50, nullable=false)
     */
    private $priApe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="seg_ape", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $segApe = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fec_nac", type="date", nullable=false)
     */
    private $fecNac;

    /**
     * @var int
     *
     * @ORM\Column(name="edad", type="integer", nullable=false)
     */
    private $edad;

    /**
     * @var string|null
     *
     * @ORM\Column(name="domicilio", type="text", length=65535, nullable=true, options={"default"="NULL"})
     */
    private $domicilio = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="fotografia", type="text", length=65535, nullable=true, options={"default"="NULL"})
     */
    private $fotografia = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="username", type="string", length=10, nullable=true, options={"default"="NULL"})
     */
    private $username = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $password = 'NULL';

    public function getIdAlu(): ?string
    {
        return $this->idAlu;
    }

    public function getCurp(): ?string
    {
        return $this->curp;
    }

    public function setCurp(string $curp): self
    {
        $this->curp = $curp;

        return $this;
    }

    public function getNomAlu(): ?string
    {
        return $this->nomAlu;
    }

    public function setNomAlu(string $nomAlu): self
    {
        $this->nomAlu = $nomAlu;

        return $this;
    }

    public function getPriApe(): ?string
    {
        return $this->priApe;
    }

    public function setPriApe(string $priApe): self
    {
        $this->priApe = $priApe;

        return $this;
    }

    public function getSegApe(): ?string
    {
        return $this->segApe;
    }

    public function setSegApe(?string $segApe): self
    {
        $this->segApe = $segApe;

        return $this;
    }

    public function getFecNac(): ?\DateTimeInterface
    {
        return $this->fecNac;
    }

    public function setFecNac(\DateTimeInterface $fecNac): self
    {
        $this->fecNac = $fecNac;

        return $this;
    }

    public function getEdad(): ?int
    {
        return $this->edad;
    }

    public function setEdad(int $edad): self
    {
        $this->edad = $edad;

        return $this;
    }

    public function getDomicilio(): ?string
    {
        return $this->domicilio;
    }

    public function setDomicilio(?string $domicilio): self
    {
        $this->domicilio = $domicilio;

        return $this;
    }

    public function getFotografia(): ?string
    {
        return $this->fotografia;
    }

    public function setFotografia(?string $fotografia): self
    {
        $this->fotografia = $fotografia;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }


}

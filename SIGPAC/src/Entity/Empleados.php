<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empleados
 *
 * @ORM\Table(name="empleados", indexes={@ORM\Index(name="cve_rol", columns={"cve_rol"})})
 * @ORM\Entity
 */
class Empleados
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_emp", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEmp;

    /**
     * @var string
     *
     * @ORM\Column(name="identificador", type="string", length=20, nullable=false)
     */
    private $identificador;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_emp", type="string", length=50, nullable=false)
     */
    private $nomEmp;

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

    /**
     * @var \CatalogoRoles
     *
     * @ORM\ManyToOne(targetEntity="CatalogoRoles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cve_rol", referencedColumnName="id_rol")
     * })
     */
    private $cveRol;

    public function getIdEmp(): ?int
    {
        return $this->idEmp;
    }

    public function getIdentificador(): ?string
    {
        return $this->identificador;
    }

    public function setIdentificador(string $identificador): self
    {
        $this->identificador = $identificador;

        return $this;
    }

    public function getNomEmp(): ?string
    {
        return $this->nomEmp;
    }

    public function setNomEmp(string $nomEmp): self
    {
        $this->nomEmp = $nomEmp;

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

    public function getCveRol(): ?CatalogoRoles
    {
        return $this->cveRol;
    }

    public function setCveRol(?CatalogoRoles $cveRol): self
    {
        $this->cveRol = $cveRol;

        return $this;
    }


}

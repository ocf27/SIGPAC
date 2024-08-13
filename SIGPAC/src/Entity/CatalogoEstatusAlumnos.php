<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CatalogoEstatusAlumnos
 *
 * @ORM\Table(name="catalogo_estatus_alumnos")
 * @ORM\Entity
 */
class CatalogoEstatusAlumnos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_est_alu", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEstAlu;

    /**
     * @var int
     *
     * @ORM\Column(name="clave", type="integer", nullable=false)
     */
    private $clave;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", length=65535, nullable=false)
     */
    private $descripcion;

    public function getIdEstAlu(): ?int
    {
        return $this->idEstAlu;
    }

    public function getClave(): ?int
    {
        return $this->clave;
    }

    public function setClave(int $clave): self
    {
        $this->clave = $clave;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }


}

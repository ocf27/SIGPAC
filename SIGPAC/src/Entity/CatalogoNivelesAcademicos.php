<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CatalogoNivelesAcademicos
 *
 * @ORM\Table(name="catalogo_niveles_academicos")
 * @ORM\Entity
 */
class CatalogoNivelesAcademicos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_niv_aca", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNivAca;

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

    public function getIdNivAca(): ?int
    {
        return $this->idNivAca;
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

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CatalogoEstatusSolicitudes
 *
 * @ORM\Table(name="catalogo_estatus_solicitudes")
 * @ORM\Entity
 */
class CatalogoEstatusSolicitudes
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_est_sol", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEstSol;

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

    public function getIdEstSol(): ?int
    {
        return $this->idEstSol;
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

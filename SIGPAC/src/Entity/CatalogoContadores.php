<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CatalogoContadores
 *
 * @ORM\Table(name="catalogo_contadores")
 * @ORM\Entity
 */
class CatalogoContadores
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_con", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCon;

    /**
     * @var int
     *
     * @ORM\Column(name="valor", type="bigint", nullable=false)
     */
    private $valor;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", length=65535, nullable=false)
     */
    private $descripcion;

    public function getIdCon(): ?int
    {
        return $this->idCon;
    }

    public function getValor(): ?string
    {
        return $this->valor;
    }

    public function setValor(string $valor): self
    {
        $this->valor = $valor;

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

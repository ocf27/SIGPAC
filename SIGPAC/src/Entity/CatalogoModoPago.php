<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CatalogoModoPago
 *
 * @ORM\Table(name="catalogo_modo_pago")
 * @ORM\Entity
 */
class CatalogoModoPago
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_mod_pag", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idModPag;

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

    public function getIdModPag(): ?int
    {
        return $this->idModPag;
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

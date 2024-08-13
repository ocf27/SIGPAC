<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Planteles
 *
 * @ORM\Table(name="planteles")
 * @ORM\Entity
 */
class Planteles
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_pla", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPla;

    /**
     * @var int
     *
     * @ORM\Column(name="clave", type="integer", nullable=false)
     */
    private $clave;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_pla", type="text", length=65535, nullable=false)
     */
    private $nomPla;

    public function getIdPla(): ?int
    {
        return $this->idPla;
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

    public function getNomPla(): ?string
    {
        return $this->nomPla;
    }

    public function setNomPla(string $nomPla): self
    {
        $this->nomPla = $nomPla;

        return $this;
    }


}

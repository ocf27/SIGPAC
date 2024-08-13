<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ingresos
 *
 * @ORM\Table(name="ingresos", indexes={@ORM\Index(name="cve_pag", columns={"cve_pag"}), @ORM\Index(name="cve_mod_pag", columns={"cve_mod_pag"})})
 * @ORM\Entity
 */
class Ingresos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_ing", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idIng;

    /**
     * @var string
     *
     * @ORM\Column(name="monto", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $monto;

    /**
     * @var string
     *
     * @ORM\Column(name="recargos", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $recargos;

    /**
     * @var string
     *
     * @ORM\Column(name="total", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $total;

    /**
     * @var string
     *
     * @ORM\Column(name="recibo", type="string", length=15, nullable=false)
     */
    private $recibo;

    /**
     * @var \Pagos
     *
     * @ORM\ManyToOne(targetEntity="Pagos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cve_pag", referencedColumnName="id_pago")
     * })
     */
    private $cvePag;

    /**
     * @var \CatalogoModoPago
     *
     * @ORM\ManyToOne(targetEntity="CatalogoModoPago")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cve_mod_pag", referencedColumnName="id_mod_pag")
     * })
     */
    private $cveModPag;

    public function getIdIng(): ?string
    {
        return $this->idIng;
    }

    public function getMonto(): ?string
    {
        return $this->monto;
    }

    public function setMonto(string $monto): self
    {
        $this->monto = $monto;

        return $this;
    }

    public function getRecargos(): ?string
    {
        return $this->recargos;
    }

    public function setRecargos(string $recargos): self
    {
        $this->recargos = $recargos;

        return $this;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(string $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getRecibo(): ?string
    {
        return $this->recibo;
    }

    public function setRecibo(string $recibo): self
    {
        $this->recibo = $recibo;

        return $this;
    }

    public function getCvePag(): ?Pagos
    {
        return $this->cvePag;
    }

    public function setCvePag(?Pagos $cvePag): self
    {
        $this->cvePag = $cvePag;

        return $this;
    }

    public function getCveModPag(): ?CatalogoModoPago
    {
        return $this->cveModPag;
    }

    public function setCveModPag(?CatalogoModoPago $cveModPag): self
    {
        $this->cveModPag = $cveModPag;

        return $this;
    }


}

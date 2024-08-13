<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pagos
 *
 * @ORM\Table(name="pagos", indexes={@ORM\Index(name="cve_mat", columns={"cve_mat"})})
 * @ORM\Entity
 */
class Pagos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_pago", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPago;

    /**
     * @var int
     *
     * @ORM\Column(name="periodo", type="integer", nullable=false)
     */
    private $periodo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="mes", type="string", length=15, nullable=false)
     */
    private $mes;

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
     * @var \Matricula
     *
     * @ORM\ManyToOne(targetEntity="Matricula")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cve_mat", referencedColumnName="id_mat")
     * })
     */
    private $cveMat;

    public function getIdPago(): ?string
    {
        return $this->idPago;
    }

    public function getPeriodo(): ?int
    {
        return $this->periodo;
    }

    public function setPeriodo(int $periodo): self
    {
        $this->periodo = $periodo;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getMes(): ?string
    {
        return $this->mes;
    }

    public function setMes(string $mes): self
    {
        $this->mes = $mes;

        return $this;
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

    public function getCveMat(): ?Matricula
    {
        return $this->cveMat;
    }

    public function setCveMat(?Matricula $cveMat): self
    {
        $this->cveMat = $cveMat;

        return $this;
    }


}

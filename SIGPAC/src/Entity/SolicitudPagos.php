<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SolicitudPagos
 *
 * @ORM\Table(name="solicitud_pagos", indexes={@ORM\Index(name="cve_emp", columns={"cve_emp"}), @ORM\Index(name="cve_alu", columns={"cve_alu"}), @ORM\Index(name="cve_pag", columns={"cve_pag"}), @ORM\Index(name="cve_est_sol", columns={"cve_est_sol"})})
 * @ORM\Entity
 */
class SolicitudPagos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_sol_pag", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSolPag;

    /**
     * @var string
     *
     * @ORM\Column(name="folio", type="string", length=20, nullable=false)
     */
    private $folio;

    /**
     * @var string
     *
     * @ORM\Column(name="rut_com", type="text", length=65535, nullable=false)
     */
    private $rutCom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fec_sol", type="date", nullable=false)
     */
    private $fecSol;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fec_apr", type="date", nullable=true, options={"default"="NULL"})
     */
    private $fecApr = 'NULL';

    /**
     * @var \Alumnos
     *
     * @ORM\ManyToOne(targetEntity="Alumnos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cve_alu", referencedColumnName="id_alu")
     * })
     */
    private $cveAlu;

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
     * @var \CatalogoEstatusSolicitudes
     *
     * @ORM\ManyToOne(targetEntity="CatalogoEstatusSolicitudes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cve_est_sol", referencedColumnName="id_est_sol")
     * })
     */
    private $cveEstSol;

    /**
     * @var \Empleados
     *
     * @ORM\ManyToOne(targetEntity="Empleados")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cve_emp", referencedColumnName="id_emp")
     * })
     */
    private $cveEmp;

    public function getIdSolPag(): ?string
    {
        return $this->idSolPag;
    }

    public function getFolio(): ?string
    {
        return $this->folio;
    }

    public function setFolio(string $folio): self
    {
        $this->folio = $folio;

        return $this;
    }

    public function getRutCom(): ?string
    {
        return $this->rutCom;
    }

    public function setRutCom(string $rutCom): self
    {
        $this->rutCom = $rutCom;

        return $this;
    }

    public function getFecSol(): ?\DateTimeInterface
    {
        return $this->fecSol;
    }

    public function setFecSol(\DateTimeInterface $fecSol): self
    {
        $this->fecSol = $fecSol;

        return $this;
    }

    public function getFecApr(): ?\DateTimeInterface
    {
        return $this->fecApr;
    }

    public function setFecApr(?\DateTimeInterface $fecApr): self
    {
        $this->fecApr = $fecApr;

        return $this;
    }

    public function getCveAlu(): ?Alumnos
    {
        return $this->cveAlu;
    }

    public function setCveAlu(?Alumnos $cveAlu): self
    {
        $this->cveAlu = $cveAlu;

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

    public function getCveEstSol(): ?CatalogoEstatusSolicitudes
    {
        return $this->cveEstSol;
    }

    public function setCveEstSol(?CatalogoEstatusSolicitudes $cveEstSol): self
    {
        $this->cveEstSol = $cveEstSol;

        return $this;
    }

    public function getCveEmp(): ?Empleados
    {
        return $this->cveEmp;
    }

    public function setCveEmp(?Empleados $cveEmp): self
    {
        $this->cveEmp = $cveEmp;

        return $this;
    }


}

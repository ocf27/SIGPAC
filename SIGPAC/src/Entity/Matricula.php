<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matricula
 *
 * @ORM\Table(name="matricula", indexes={@ORM\Index(name="cve_est_alu", columns={"cve_est_alu"}), @ORM\Index(name="cve_alu", columns={"cve_alu"}), @ORM\Index(name="cve_niv_aca", columns={"cve_niv_aca"}), @ORM\Index(name="cve_pla", columns={"cve_pla"}), @ORM\Index(name="cve_ofe_edu", columns={"cve_ofe_edu"})})
 * @ORM\Entity
 */
class Matricula
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_mat", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMat;

    /**
     * @var string
     *
     * @ORM\Column(name="cve_ctl", type="string", length=10, nullable=false)
     */
    private $cveCtl;

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
     * @var \Planteles
     *
     * @ORM\ManyToOne(targetEntity="Planteles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cve_pla", referencedColumnName="id_pla")
     * })
     */
    private $cvePla;

    /**
     * @var \CatalogoOfertaEducativa
     *
     * @ORM\ManyToOne(targetEntity="CatalogoOfertaEducativa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cve_ofe_edu", referencedColumnName="id_ofe_edu")
     * })
     */
    private $cveOfeEdu;

    /**
     * @var \CatalogoEstatusAlumnos
     *
     * @ORM\ManyToOne(targetEntity="CatalogoEstatusAlumnos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cve_est_alu", referencedColumnName="id_est_alu")
     * })
     */
    private $cveEstAlu;

    /**
     * @var \CatalogoNivelesAcademicos
     *
     * @ORM\ManyToOne(targetEntity="CatalogoNivelesAcademicos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cve_niv_aca", referencedColumnName="id_niv_aca")
     * })
     */
    private $cveNivAca;

    public function getIdMat(): ?string
    {
        return $this->idMat;
    }

    public function getCveCtl(): ?string
    {
        return $this->cveCtl;
    }

    public function setCveCtl(string $cveCtl): self
    {
        $this->cveCtl = $cveCtl;

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

    public function getCvePla(): ?Planteles
    {
        return $this->cvePla;
    }

    public function setCvePla(?Planteles $cvePla): self
    {
        $this->cvePla = $cvePla;

        return $this;
    }

    public function getCveOfeEdu(): ?CatalogoOfertaEducativa
    {
        return $this->cveOfeEdu;
    }

    public function setCveOfeEdu(?CatalogoOfertaEducativa $cveOfeEdu): self
    {
        $this->cveOfeEdu = $cveOfeEdu;

        return $this;
    }

    public function getCveEstAlu(): ?CatalogoEstatusAlumnos
    {
        return $this->cveEstAlu;
    }

    public function setCveEstAlu(?CatalogoEstatusAlumnos $cveEstAlu): self
    {
        $this->cveEstAlu = $cveEstAlu;

        return $this;
    }

    public function getCveNivAca(): ?CatalogoNivelesAcademicos
    {
        return $this->cveNivAca;
    }

    public function setCveNivAca(?CatalogoNivelesAcademicos $cveNivAca): self
    {
        $this->cveNivAca = $cveNivAca;

        return $this;
    }


}

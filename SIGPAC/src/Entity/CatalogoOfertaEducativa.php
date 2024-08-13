<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CatalogoOfertaEducativa
 *
 * @ORM\Table(name="catalogo_oferta_educativa", indexes={@ORM\Index(name="cve_niv_aca", columns={"cve_niv_aca"})})
 * @ORM\Entity
 */
class CatalogoOfertaEducativa
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_ofe_edu", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOfeEdu;

    /**
     * @var string
     *
     * @ORM\Column(name="clave", type="string", length=20, nullable=false)
     */
    private $clave;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_ofe_edu", type="text", length=65535, nullable=false)
     */
    private $nomOfeEdu;

    /**
     * @var \CatalogoNivelesAcademicos
     *
     * @ORM\ManyToOne(targetEntity="CatalogoNivelesAcademicos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cve_niv_aca", referencedColumnName="id_niv_aca")
     * })
     */
    private $cveNivAca;

    public function getIdOfeEdu(): ?int
    {
        return $this->idOfeEdu;
    }

    public function getClave(): ?string
    {
        return $this->clave;
    }

    public function setClave(string $clave): self
    {
        $this->clave = $clave;

        return $this;
    }

    public function getNomOfeEdu(): ?string
    {
        return $this->nomOfeEdu;
    }

    public function setNomOfeEdu(string $nomOfeEdu): self
    {
        $this->nomOfeEdu = $nomOfeEdu;

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

<?php

namespace App\Entity;

use App\Repository\EstimationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EstimationRepository::class)
 */
class Estimation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_estimation;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="estimations")
     */
    private $idProduit;

    /**
     * @ORM\ManyToOne(targetEntity=CommissairePriseur::class, inversedBy="estimations")
     */
    private $idCommissaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateEstimation(): ?\DateTimeInterface
    {
        return $this->date_estimation;
    }

    public function setDateEstimation(?\DateTimeInterface $date_estimation): self
    {
        $this->date_estimation = $date_estimation;

        return $this;
    }

    public function getIdProduit(): ?Produit
    {
        return $this->idProduit;
    }

    public function setIdProduit(?Produit $idProduit): self
    {
        $this->idProduit = $idProduit;

        return $this;
    }

    public function getIdCommissaire(): ?CommissairePriseur
    {
        return $this->idCommissaire;
    }

    public function setIdCommissaire(?CommissairePriseur $idCommissaire): self
    {
        $this->idCommissaire = $idCommissaire;

        return $this;
    }
}

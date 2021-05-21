<?php

namespace App\Entity;

use App\Repository\OffreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OffreRepository::class)
 */
class Offre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $OffreAcheteur;


    /**
     * @ORM\ManyToOne(targetEntity=Acheteur::class, inversedBy="offres")
     */
    private $idAcheteur;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $heure;

    /**
     * @ORM\ManyToOne(targetEntity=Lot::class, inversedBy="offres")
     */
    private $idLot;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOffreAcheteur(): ?float
    {
        return $this->OffreAcheteur;
    }

    public function setOffreAcheteur(?float $OffreAcheteur): self
    {
        $this->OffreAcheteur = $OffreAcheteur;

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

    public function getIdAcheteur(): ?Acheteur
    {
        return $this->idAcheteur;
    }

    public function setIdAcheteur(?Acheteur $idAcheteur): self
    {
        $this->idAcheteur = $idAcheteur;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->heure;
    }

    public function setHeure(?\DateTimeInterface $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getIdLot(): ?Lot
    {
        return $this->idLot;
    }

    public function setIdLot(?Lot $idLot): self
    {
        $this->idLot = $idLot;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $idLot;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $idVente;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $idVendeur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
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

    public function getIdLot(): ?int
    {
        return $this->idLot;
    }

    public function setIdLot(?int $idLot): self
    {
        $this->idLot = $idLot;

        return $this;
    }

    public function getIdVente(): ?int
    {
        return $this->idVente;
    }

    public function setIdVente(?int $idVente): self
    {
        $this->idVente = $idVente;

        return $this;
    }

    public function getIdVendeur(): ?int
    {
        return $this->idVendeur;
    }

    public function setIdVendeur(?int $idVendeur): self
    {
        $this->idVendeur = $idVendeur;

        return $this;
    }
}

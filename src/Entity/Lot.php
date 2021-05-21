<?php

namespace App\Entity;

use App\Repository\LotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LotRepository::class)
 */
class Lot
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Produit::class, mappedBy="Lot")
     */
    private $produits;

    /**
     * @ORM\ManyToOne(targetEntity=Vente::class, inversedBy="lots")
     */
    private $idVente;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prix_depart;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isvendu;

    /**
     * @ORM\OneToMany(targetEntity=Offre::class, mappedBy="idLot")
     */
    private $offres;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
        $this->offres = new ArrayCollection();
    }

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

    /**
     * @return Collection|Produit[]
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->setLot($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getLot() === $this) {
                $produit->setLot(null);
            }
        }

        return $this;
    }

    public function getIdVente(): ?Vente
    {
        return $this->idVente;
    }

    public function setIdVente(?Vente $idVente): self
    {
        $this->idVente = $idVente;

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }

    public function getPrixDepart(): ?float
    {
        return $this->prix_depart;
    }

    public function setPrixDepart(?float $prix_depart): self
    {
        $this->prix_depart = $prix_depart;

        return $this;
    }

    public function getIsvendu(): ?bool
    {
        return $this->isvendu;
    }

    public function setIsvendu(?bool $isvendu): self
    {
        $this->isvendu = $isvendu;

        return $this;
    }

    /**
     * @return Collection|Offre[]
     */
    public function getOffres(): Collection
    {
        return $this->offres;
    }

    public function addOffre(Offre $offre): self
    {
        if (!$this->offres->contains($offre)) {
            $this->offres[] = $offre;
            $offre->setIdLot($this);
        }

        return $this;
    }

    public function removeOffre(Offre $offre): self
    {
        if ($this->offres->removeElement($offre)) {
            // set the owning side to null (unless already changed)
            if ($offre->getIdLot() === $this) {
                $offre->setIdLot(null);
            }
        }

        return $this;
    }
}

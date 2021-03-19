<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $prixDepart;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $prixReserve;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $etat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $artiste;

    /**
     * @ORM\ManyToOne(targetEntity=Lot::class, inversedBy="produits")
     */
    private $Lot;

    /**
     * @ORM\ManyToOne(targetEntity=Vendeur::class, inversedBy="produits")
     */
    private $idVendeur;

    /**
     * @ORM\ManyToMany(targetEntity=Categorie::class, mappedBy="idProduit")
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity=Photo::class, mappedBy="idProduit")
     */
    private $photos;

    /**
     * @ORM\OneToMany(targetEntity=Estimation::class, mappedBy="idProduit")
     */
    private $estimations;

    /**
     * @ORM\OneToMany(targetEntity=Offre::class, mappedBy="idProduit")
     */
    private $offres;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->photos = new ArrayCollection();
        $this->estimations = new ArrayCollection();
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

    public function getPrixDepart(): ?int
    {
        return $this->prixDepart;
    }

    public function setPrixDepart(?int $prixDepart): self
    {
        $this->prixDepart = $prixDepart;

        return $this;
    }

    public function getPrixReserve(): ?int
    {
        return $this->prixReserve;
    }

    public function setPrixReserve(?int $prixReserve): self
    {
        $this->prixReserve = $prixReserve;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(?string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getArtiste(): ?string
    {
        return $this->artiste;
    }

    public function setArtiste(?string $artiste): self
    {
        $this->artiste = $artiste;

        return $this;
    }

    public function getLot(): ?Lot
    {
        return $this->Lot;
    }

    public function setLot(?Lot $Lot): self
    {
        $this->Lot = $Lot;

        return $this;
    }

    public function getIdVendeur(): ?Vendeur
    {
        return $this->idVendeur;
    }

    public function setIdVendeur(?Vendeur $idVendeur): self
    {
        $this->idVendeur = $idVendeur;

        return $this;
    }

    /**
     * @return Collection|Categorie[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categorie $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->addIdProduit($this);
        }

        return $this;
    }

    public function removeCategory(Categorie $category): self
    {
        if ($this->categories->removeElement($category)) {
            $category->removeIdProduit($this);
        }

        return $this;
    }

    /**
     * @return Collection|Photo[]
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photo $photo): self
    {
        if (!$this->photos->contains($photo)) {
            $this->photos[] = $photo;
            $photo->setIdProduit($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): self
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getIdProduit() === $this) {
                $photo->setIdProduit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Estimation[]
     */
    public function getEstimations(): Collection
    {
        return $this->estimations;
    }

    public function addEstimation(Estimation $estimation): self
    {
        if (!$this->estimations->contains($estimation)) {
            $this->estimations[] = $estimation;
            $estimation->setIdProduit($this);
        }

        return $this;
    }

    public function removeEstimation(Estimation $estimation): self
    {
        if ($this->estimations->removeElement($estimation)) {
            // set the owning side to null (unless already changed)
            if ($estimation->getIdProduit() === $this) {
                $estimation->setIdProduit(null);
            }
        }

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
            $offre->setIdProduit($this);
        }

        return $this;
    }

    public function removeOffre(Offre $offre): self
    {
        if ($this->offres->removeElement($offre)) {
            // set the owning side to null (unless already changed)
            if ($offre->getIdProduit() === $this) {
                $offre->setIdProduit(null);
            }
        }

        return $this;
    }
}

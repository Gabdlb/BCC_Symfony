<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
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
     * @ORM\ManyToMany(targetEntity=Produit::class, inversedBy="categories")
     */
    private $idProduit;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="idCategories")
     */
    private $categorie;

    /**
     * @ORM\OneToMany(targetEntity=Categorie::class, mappedBy="categorie")
     */
    private $idCategories;

    public function __construct()
    {
        $this->idProduit = new ArrayCollection();
        $this->idCategories = new ArrayCollection();
    }

    public function __toString(){
        return (string)$this->nom;
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

    /**
     * @return Collection|Produit[]
     */
    public function getIdProduit(): Collection
    {
        return $this->idProduit;
    }

    public function addIdProduit(Produit $idProduit): self
    {
        if (!$this->idProduit->contains($idProduit)) {
            $this->idProduit[] = $idProduit;
        }

        return $this;
    }

    public function removeIdProduit(Produit $idProduit): self
    {
        $this->idProduit->removeElement($idProduit);

        return $this;
    }

    public function getCategorie(): ?self
    {
        return $this->categorie;
    }

    public function setCategorie(?self $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getIdCategories(): Collection
    {
        return $this->idCategories;
    }

    public function addIdCategory(self $idCategory): self
    {
        if (!$this->idCategories->contains($idCategory)) {
            $this->idCategories[] = $idCategory;
            $idCategory->setCategorie($this);
        }

        return $this;
    }

    public function removeIdCategory(self $idCategory): self
    {
        if ($this->idCategories->removeElement($idCategory)) {
            // set the owning side to null (unless already changed)
            if ($idCategory->getCategorie() === $this) {
                $idCategory->setCategorie(null);
            }
        }

        return $this;
    }
}

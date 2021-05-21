<?php

namespace App\Entity;

use App\Repository\AcheteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AcheteurRepository::class)
 */
class Acheteur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $solvable;

    /**
     * @ORM\OneToMany(targetEntity=Offre::class, mappedBy="idAcheteur")
     */
    private $offres;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $moyen_paiement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $identite;

    /**
     * @ORM\OneToOne(targetEntity=Utilisateur::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUtilisateur;

    public function __construct()
    {
        $this->offres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSolvable(): ?int
    {
        return $this->solvable;
    }

    public function setSolvable(?int $solvable): self
    {
        $this->solvable = $solvable;

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
            $offre->setIdAcheteur($this);
        }

        return $this;
    }

    public function removeOffre(Offre $offre): self
    {
        if ($this->offres->removeElement($offre)) {
            // set the owning side to null (unless already changed)
            if ($offre->getIdAcheteur() === $this) {
                $offre->setIdAcheteur(null);
            }
        }

        return $this;
    }

    public function getMoyenPaiement(): ?string
    {
        return $this->moyen_paiement;
    }

    public function setMoyenPaiement(?string $moyen_paiement): self
    {
        $this->moyen_paiement = $moyen_paiement;

        return $this;
    }

    public function getIdentite(): ?string
    {
        return $this->identite;
    }

    public function setIdentite(?string $identite): self
    {
        $this->identite = $identite;

        return $this;
    }

    public function getIdUtilisateur(): ?Utilisateur
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(Utilisateur $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }
}

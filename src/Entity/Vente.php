<?php

namespace App\Entity;

use App\Repository\VenteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VenteRepository::class)
 */
class Vente
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
    private $attribute;

    /**
     * @ORM\OneToMany(targetEntity=Lot::class, mappedBy="idVente")
     */
    private $lots;

    public function __construct()
    {
        $this->lots = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAttribute(): ?string
    {
        return $this->attribute;
    }

    public function setAttribute(?string $attribute): self
    {
        $this->attribute = $attribute;

        return $this;
    }

    /**
     * @return Collection|Lot[]
     */
    public function getLots(): Collection
    {
        return $this->lots;
    }

    public function addLot(Lot $lot): self
    {
        if (!$this->lots->contains($lot)) {
            $this->lots[] = $lot;
            $lot->setIdVente($this);
        }

        return $this;
    }

    public function removeLot(Lot $lot): self
    {
        if ($this->lots->removeElement($lot)) {
            // set the owning side to null (unless already changed)
            if ($lot->getIdVente() === $this) {
                $lot->setIdVente(null);
            }
        }

        return $this;
    }
}

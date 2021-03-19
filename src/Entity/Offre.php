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
}

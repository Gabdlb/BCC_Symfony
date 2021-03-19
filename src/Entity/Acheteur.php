<?php

namespace App\Entity;

use App\Repository\AcheteurRepository;
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
}

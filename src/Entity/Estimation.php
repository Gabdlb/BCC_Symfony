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
}

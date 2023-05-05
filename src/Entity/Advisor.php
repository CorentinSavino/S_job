<?php

namespace App\Entity;

use App\Repository\AdvisorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdvisorRepository::class)]
class Advisor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 15)]
    private ?string $advisor_number = null;

    #[ORM\Column(length: 255)]
    private ?string $pro_email = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdvisorNumber(): ?string
    {
        return $this->advisor_number;
    }

    public function setAdvisorNumber(string $advisor_number): self
    {
        $this->advisor_number = $advisor_number;

        return $this;
    }

    public function getProEmail(): ?string
    {
        return $this->pro_email;
    }

    public function setProEmail(string $pro_email): self
    {
        $this->pro_email = $pro_email;

        return $this;
    }
}

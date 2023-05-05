<?php

namespace App\Entity;

use App\Repository\AdvisorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'advisor', targetEntity: User::class)]
    private Collection $users;

    #[ORM\ManyToOne(inversedBy: 'advisors')]
    private ?Address $address = null;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setAdvisor($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getAdvisor() === $this) {
                $user->setAdvisor(null);
            }
        }

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): self
    {
        $this->address = $address;

        return $this;
    }
}

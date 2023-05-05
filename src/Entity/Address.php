<?php

namespace App\Entity;

use App\Repository\AddressRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AddressRepository::class)]
class Address
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $street_number = null;

    #[ORM\Column(length: 255)]
    private ?string $street_name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $additional = null;

    #[ORM\Column(length: 255)]
    private ?string $zip = null;

    #[ORM\Column(length: 60)]
    private ?string $city = null;

    #[ORM\Column(nullable: true)]
    private ?int $radius = null;

    #[ORM\Column(length: 60)]
    private ?string $sector = null;

    #[ORM\OneToMany(mappedBy: 'address', targetEntity: User::class)]
    private Collection $users;

    #[ORM\OneToMany(mappedBy: 'address', targetEntity: Advisor::class)]
    private Collection $advisors;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->advisors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStreetNumber(): ?int
    {
        return $this->street_number;
    }

    public function setStreetNumber(int $street_number): self
    {
        $this->street_number = $street_number;

        return $this;
    }

    public function getStreetName(): ?string
    {
        return $this->street_name;
    }

    public function setStreetName(string $street_name): self
    {
        $this->street_name = $street_name;

        return $this;
    }

    public function getAdditional(): ?string
    {
        return $this->additional;
    }

    public function setAdditional(?string $additional): self
    {
        $this->additional = $additional;

        return $this;
    }

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(string $zip): self
    {
        $this->zip = $zip;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getRadius(): ?int
    {
        return $this->radius;
    }

    public function setRadius(?int $radius): self
    {
        $this->radius = $radius;

        return $this;
    }

    public function getSector(): ?string
    {
        return $this->sector;
    }

    public function setSector(string $sector): self
    {
        $this->sector = $sector;

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
            $user->setAddress($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getAddress() === $this) {
                $user->setAddress(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Advisor>
     */
    public function getAdvisors(): Collection
    {
        return $this->advisors;
    }

    public function addAdvisor(Advisor $advisor): self
    {
        if (!$this->advisors->contains($advisor)) {
            $this->advisors->add($advisor);
            $advisor->setAddress($this);
        }

        return $this;
    }

    public function removeAdvisor(Advisor $advisor): self
    {
        if ($this->advisors->removeElement($advisor)) {
            // set the owning side to null (unless already changed)
            if ($advisor->getAddress() === $this) {
                $advisor->setAddress(null);
            }
        }

        return $this;
    }
}

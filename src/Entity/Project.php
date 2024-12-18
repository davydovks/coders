<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank]
    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[Assert\NotBlank]
    #[ORM\Column(length: 255)]
    private ?string $customer = null;

    /**
     * @var Collection<int, Coder>
     */
    #[ORM\ManyToMany(targetEntity: Coder::class, inversedBy: 'projects')]
    private Collection $coders;

    #[ORM\Column]
    private bool $closed = false;

    public function __construct()
    {
        $this->coders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCustomer(): ?string
    {
        return $this->customer;
    }

    public function setCustomer(string $customer): static
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return Collection<int, Coder>
     */
    public function getCoders(): Collection
    {
        return $this->coders;
    }

    public function addCoder(Coder $coder): static
    {
        if (!$this->coders->contains($coder)) {
            $this->coders->add($coder);
        }

        return $this;
    }

    public function removeCoder(Coder $coder): static
    {
        $this->coders->removeElement($coder);

        return $this;
    }

    public function isClosed(): bool
    {
        return $this->closed;
    }

    public function setClosed(bool $closed): static
    {
        $this->closed = $closed;

        return $this;
    }
}

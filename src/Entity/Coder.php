<?php

namespace App\Entity;

use App\Repository\CoderRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CoderRepository::class)]
class Coder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank]
    #[Assert\Type('string')]
    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[Assert\NotBlank]
    #[Assert\Type('string')]
    #[ORM\Column(length: 255)]
    private ?string $position = null;

    #[Assert\NotBlank]
    #[Assert\Type('string')]
    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[Assert\NotBlank]
    #[Assert\Type('string')]
    #[ORM\Column(length: 18)]
    private ?string $phone = null;

    #[Assert\NotBlank]
    #[Assert\Type(\DateTimeInterface::class)]
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birthdate = null;

    #[Assert\Type('boolean')]
    #[ORM\Column]
    private bool $fired = false;

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

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): static
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getFired(): ?bool
    {
        return $this->fired;
    }

    public function setFired(bool $fired): static
    {
        $this->fired = $fired;

        return $this;
    }
}

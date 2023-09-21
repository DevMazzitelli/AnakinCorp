<?php

namespace App\Entity;

use App\Repository\EquipeCallOfDutyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipeCallOfDutyRepository::class)]
class EquipeCallOfDuty
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(length: 255)]
    private ?string $presentationIRL = null;

    #[ORM\Column(length: 255)]
    private ?string $presentationIG = null;

    #[ORM\Column(length: 255)]
    private ?string $images = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPresentationIRL(): ?string
    {
        return $this->presentationIRL;
    }

    public function setPresentationIRL(string $presentationIRL): static
    {
        $this->presentationIRL = $presentationIRL;

        return $this;
    }

    public function getPresentationIG(): ?string
    {
        return $this->presentationIG;
    }

    public function setPresentationIG(string $presentationIG): static
    {
        $this->presentationIG = $presentationIG;

        return $this;
    }

    public function getImages(): ?string
    {
        return $this->images;
    }

    public function setImages(string $images): static
    {
        $this->images = $images;

        return $this;
    }
}

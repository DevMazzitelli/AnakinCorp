<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageCompetition = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imagePartenaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ImageActualite = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageStreamer = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageCompetition(): ?string
    {
        return $this->imageCompetition;
    }

    public function setImageCompetition(string $imageCompetition): static
    {
        $this->imageCompetition = $imageCompetition;

        return $this;
    }

    public function getImagePartenaire(): ?string
    {
        return $this->imagePartenaire;
    }

    public function setImagePartenaire(string $imagePartenaire): static
    {
        $this->imagePartenaire = $imagePartenaire;

        return $this;
    }

    public function getImageActualite(): ?string
    {
        return $this->ImageActualite;
    }

    public function setImageActualite(string $ImageActualite): static
    {
        $this->ImageActualite = $ImageActualite;

        return $this;
    }

    public function getImageStreamer(): ?string
    {
        return $this->imageStreamer;
    }

    public function setImageStreamer(string $imageStreamer): static
    {
        $this->imageStreamer = $imageStreamer;

        return $this;
    }
}

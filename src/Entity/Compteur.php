<?php

namespace App\Entity;

use App\Repository\CompteurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompteurRepository::class)]
class Compteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nbrJoueur = null;

    #[ORM\Column]
    private ?int $nbrMembre = null;

    #[ORM\Column]
    private ?int $nbrEquipe = null;

    #[ORM\Column]
    private ?int $nbrStaff = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbrJoueur(): ?int
    {
        return $this->nbrJoueur;
    }

    public function setNbrJoueur(int $nbrJoueur): static
    {
        $this->nbrJoueur = $nbrJoueur;

        return $this;
    }

    public function getNbrMembre(): ?int
    {
        return $this->nbrMembre;
    }

    public function setNbrMembre(int $nbrMembre): static
    {
        $this->nbrMembre = $nbrMembre;

        return $this;
    }

    public function getNbrEquipe(): ?int
    {
        return $this->nbrEquipe;
    }

    public function setNbrEquipe(int $nbrEquipe): static
    {
        $this->nbrEquipe = $nbrEquipe;

        return $this;
    }

    public function getNbrStaff(): ?int
    {
        return $this->nbrStaff;
    }

    public function setNbrStaff(int $nbrStaff): static
    {
        $this->nbrStaff = $nbrStaff;

        return $this;
    }
}

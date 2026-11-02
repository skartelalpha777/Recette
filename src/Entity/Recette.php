<?php

namespace App\Entity;

use App\Repository\RecetteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;



#[ORM\Entity(repositoryClass: RecetteRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['recette:read']],
    denormalizationContext: ['groups' => ['recette:write']],
    paginationEnabled: false
)]

class Recette
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['recette:read'])]
    private ?int $id = null;


    #[ORM\Column(length: 100, nullable: false)]
    #[Assert\NotNull]
    #[Groups(['recette:read'])]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['recette:read'])]
    private ?string $description = null;

    #[ORM\Column]
    #[Assert\Range(
        min: 1,
        max: 600,
        notInRangeMessage: 'le temps doit  être compris entre {{ min }} et {{ max }}minutes',
    )]
    #[Groups(['recette:read'])]
    private ?int $tempsMinutes = null;

    #[ORM\Column(length: 20)]
    #[Groups(['recette:read'])]
    private ?string $difficult = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['recette:read'])]
    private ?string $image = null;

    #[ORM\Column]
    #[Groups(['recette:read', 'recette:write'])]
    private ?bool $favori = null;

    #[ORM\ManyToOne(inversedBy: 'recette')]
    #[Groups(['recette:read'])]
    private ?Categorie $categorie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getTempsMinutes(): ?int
    {
        return $this->tempsMinutes;
    }

    public function setTempsMinutes(int $tempsMinutes): static
    {
        $this->tempsMinutes = $tempsMinutes;

        return $this;
    }

    public function getDifficult(): ?string
    {
        return $this->difficult;
    }

    public function setDifficult(string $difficult): static
    {
        $this->difficult = $difficult;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function isFavori(): ?bool
    {
        return $this->favori;
    }

    public function setFavori(bool $favori): static
    {
        $this->favori = $favori;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }
    #[Groups(['recette:read'])]
    public function getCategorieName(): ?String
    {
        return $this->categorie->getNom();
    }

    public function setCategorie(?Categorie $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }
}

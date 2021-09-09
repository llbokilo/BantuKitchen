<?php

namespace App\Entity;

use App\Repository\RecetteIngredientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecetteIngredientRepository::class)
 */
class RecetteIngredient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("recette:read")
     * @Groups("ingredient:read")
     * @Groups("operation:read")
     */
    private $unite;

    /**
     * @ORM\Column(type="integer")
     * @Groups("recette:read")
     * @Groups("ingredient:read")
     * @Groups("operation:read")
     */
    private $quantite;

    /**
     * @ORM\ManyToOne(targetEntity=Ingredient::class)
     * 
     */
    private $IngredientID;

    /**
     * @ORM\ManyToOne(targetEntity=Recette::class)
     */
    private $RecetteId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnite(): ?string
    {
        return $this->unite;
    }

    public function setUnite(string $unite): self
    {
        $this->unite = $unite;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getIngredientID(): ?Ingredient
    {
        return $this->IngredientID;
    }

    public function setIngredientID(?Ingredient $IngredientID): self
    {
        $this->IngredientID = $IngredientID;

        return $this;
    }

    public function getRecetteId(): ?Recette
    {
        return $this->RecetteId;
    }

    public function setRecetteId(?Recette $RecetteId): self
    {
        $this->RecetteId = $RecetteId;

        return $this;
    }
}

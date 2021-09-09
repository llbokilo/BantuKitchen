<?php

namespace App\Entity;

use App\Repository\RecetteIngredientRepository;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Serializer\Annotation\Groups ;
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
     */
    private $unite;

    /**
     * @ORM\Column(type="integer")
     * @Groups("recette:read")
     */
    private $quantite;

    /**
     * @ORM\ManyToOne(targetEntity=Recette::class, inversedBy="ingredients")
     * @ORM\JoinColumn(nullable=false)
     */
    private $recette;

    /**
     * @ORM\ManyToOne(targetEntity=Ingredient::class, inversedBy="recette")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("recette:read")
     */
    private $ingredient;

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


    public function getRecette(): ?Recette
    {
        return $this->recette;
    }

    public function setRecette(?Recette $recette): self
    {
        $this->recette = $recette;

        return $this;
    }

    public function getIngredient(): ?Ingredient
    {
        return $this->ingredient;
    }

    public function setIngredient(?Ingredient $ingredient): self
    {
        $this->ingredient = $ingredient;

        return $this;
    }
}

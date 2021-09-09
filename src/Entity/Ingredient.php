<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups ;

/**
 * @ORM\Entity(repositoryClass=IngredientRepository::class)
 */
class Ingredient
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
    private $intitule;

    /**
     * @ORM\OneToMany(targetEntity=RecetteIngredient::class, mappedBy="ingredient", orphanRemoval=true)
     */
    private $recette;

    public function __construct()
    {
        $this->recette = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * @return Collection|RecetteIngredient[]
     */
    public function getRecette(): Collection
    {
        return $this->recette;
    }

    public function addRecette(RecetteIngredient $recette): self
    {
        if (!$this->recette->contains($recette)) {
            $this->recette[] = $recette;
            $recette->setIngredient($this);
        }

        return $this;
    }

    public function removeRecette(RecetteIngredient $recette): self
    {
        if ($this->recette->removeElement($recette)) {
            // set the owning side to null (unless already changed)
            if ($recette->getIngredient() === $this) {
                $recette->setIngredient(null);
            }
        }

        return $this;
    }
}

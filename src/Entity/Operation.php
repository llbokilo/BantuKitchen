<?php

namespace App\Entity;

use App\Repository\OperationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups ;

/**
 * @ORM\Entity(repositoryClass=OperationRepository::class)
 */
class Operation
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
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Recette::class)
     * @Groups("recette:read")
     * @Groups("ingredient:read")
     * @Groups("operation:read")
     */
    private $RecetteId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

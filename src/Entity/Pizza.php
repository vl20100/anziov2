<?php

namespace App\Entity;

use App\Repository\PizzaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PizzaRepository::class)]
class Pizza
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\ManyToMany(targetEntity: Ingredient::class, inversedBy: 'pizzas')]
    private $ingredients;

    #[ORM\ManyToOne(targetEntity: PizzaBase::class, inversedBy: 'pizzas')]
    #[ORM\JoinColumn(nullable: false)]
    private PizzaBase $base;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $price26;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $price33;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $price40;

    #[ORM\Column]
    private ?bool $active = null;

    public function __construct()
    {
        $this->ingredients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Ingredient>
     */
    public function getIngredients(): Collection
    {
        return $this->ingredients;
    }

    public function addIngredient(Ingredient $ingredient): self
    {
        if (!$this->ingredients->contains($ingredient)) {
            $this->ingredients[] = $ingredient;
        }

        return $this;
    }

    public function removeIngredient(Ingredient $ingredient): self
    {
        $this->ingredients->removeElement($ingredient);

        return $this;
    }

    public function getBase(): ?PizzaBase
    {
        return $this->base;
    }

    public function setBase(?PizzaBase $base): self
    {
        $this->base = $base;

        return $this;
    }

    public function getPrice26(): ?float
    {
        return $this->price26;
    }

    public function setPrice26(?float $price26): self
    {
        $this->price26 = $price26;

        return $this;
    }

    public function getPrice33(): ?float
    {
        return $this->price33;
    }

    public function setPrice33(?float $price33): self
    {
        $this->price33 = $price33;

        return $this;
    }

    public function getPrice40(): ?float
    {
        return $this->price40;
    }

    public function setPrice40(?float $price40): self
    {
        $this->price40 = $price40;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }
}

<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Pizzas;
use App\Entity\Ingredients;

/**
 * @ORM\Entity
 * @ORM\Table(name="pizzas_ingredients")
 */
class PizzasIngredients
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Pizzas::class)
     * @ORM\JoinColumn(name="pizza_id", referencedColumnName="id", nullable=false)
     */
    private $pizza;

    /**
     * @ORM\ManyToOne(targetEntity=Ingredients::class)
     * @ORM\JoinColumn(name="ingredient_id", referencedColumnName="id", nullable=false)
     */
    private $ingredient;

    /**
     * @ORM\Column(type="integer")
     */
    private $portions;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPizza(): ?Pizzas
    {
        return $this->pizza;
    }

    public function setPizza(?Pizzas $pizza): self
    {
        $this->pizza = $pizza;

        return $this;
    }

    public function getIngredient(): ?Ingredients
    {
        return $this->ingredient;
    }

    public function setIngredient(?Ingredients $ingredient): self
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    public function getPortions(): ?int
    {
        return $this->portions;
    }

    public function setPortions(int $portions): self
    {
        $this->portions = $portions;

        return $this;
    }
}
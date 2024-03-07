<?php


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Pizzas
 *
 * @ORM\Table(name="pizzas")
 * @ORM\Entity
 */
class Pizzas
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="pizzas_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="pizza_name", type="string", length=100, nullable=false)
     */
    private $pizzaName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pizza_description", type="text", nullable=true)
     */
    private $pizzaDescription;

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getPizzaName(): ?string
    {
        return $this->pizzaName;
    }

    public function setPizzaName(string $pizzaName): self
    {
        $this->pizzaName = $pizzaName;

        return $this;
    }

    Public function getPizzaDescription(): ?string{
        return $this->pizzaDescription;
    }

    public function setPizzaDescription(string $pizzaDescription): self
    {
        $this->pizzaDescription = $pizzaDescription;

        return $this;
    }

}

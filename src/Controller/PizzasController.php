<?php

namespace App\Controller;

use App\Entity\Pizzas;
use App\Entity\Ingredients;
use App\Entity\PizzasIngredients;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/pizzas')]
class PizzasController extends AbstractController
{
    #[Route('/', name: 'app_pizzas_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $pizzas = $entityManager
            ->getRepository(Pizzas::class)
            ->findAll();
        
        $ingredients = $entityManager
            ->getRepository(Ingredients::class)
            ->findAll();
        return $this->render('pizzas/index.html.twig', [
            'pizzas' => $pizzas,
            'ingredients' => $ingredients,
        ]);
    }

    /**
     * @Route("/pizzas/ingredients/{id}", name="pizzas_ingredients")
     */
    public function getPizzasIngredients($id, EntityManagerInterface $entityManager): Response
    {
        $ingredientsData = [];
        $pizzasIngredients = $entityManager
            ->getRepository(PizzasIngredients::class)
            ->findBy(['pizza' => $id]);
        foreach ($pizzasIngredients as $pizzaIngredient) {
            $ingredientId = $pizzaIngredient->getIngredient();
            $ingredient = $entityManager
                ->getRepository(Ingredients::class)
                ->find($ingredientId);

            if ($ingredient) {
                $ingredientsData[] = [
                'ingredient_name' => $ingredient->getIngredientName(),
                'price' => $ingredient->getPrice(),
                ];
            }
        }
        return new JsonResponse($ingredientsData);
    }
}

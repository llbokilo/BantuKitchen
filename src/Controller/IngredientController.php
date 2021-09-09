<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\IngredientRepository;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class IngredientController extends AbstractController
{
    /**
    * @Route("/api/ingredient", name="api_ingredient" , methods="GET")
    */
    public function index(IngredientRepository $ingredientRepository,NormalizerInterface $normalizer): Response
    {
        $ingredients = $ingredientRepository->findAll();
        $normalized = $normalizer->normalize($ingredients, null, ['groups'=>'ingredient:read']);
        $json = json_encode($normalized);
        $reponse = new Response($json, 200, ['content-type' => 'application/json']);
        return $reponse;
    }

    /**
    * @Route("/api/ingredient/{id}", name="api_ingredient_avec_id" , methods="GET")
    */
    public function findById(IngredientRepository $ingredientRepository,$id,NormalizerInterface $normalizer): Response
    {
        $ingredient = $ingredientRepository->find($id);
        $normalized = $normalizer->normalize($ingredient, null, ['groups'=>'ingredient:read']);
        $json = json_encode($normalized);
        $reponse = new Response($json, 200, ['content-type' => 'application/json']);
        return $reponse;
    }
}

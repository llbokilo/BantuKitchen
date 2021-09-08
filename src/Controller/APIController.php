<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\RecetteRepository;

class APIController extends AbstractController
{
    /**
    * @Route("/api/recette", name="api_recette")
    */
    public function index(RecetteRepository $recetteRepository): Response
    {
        $recettes = $recetteRepository->findAll();
        $json = json_encode($recettes);
        $reponse = new Response($json, 200, ['content-type' => 'application/json']);
        return $reponse;
    }

    /**
    * @Route("/api/place/{id}", name="api_place_avec_id")
    */
    public function findById(RecetteRepository $recetteRepository): Response
    {
        $recette = $recetteRepository->find($id);
        $json = json_encode($recette);
        $reponse = new Response($json, 200, ['content-type' => 'application/json']);
        return $reponse;
    }
}

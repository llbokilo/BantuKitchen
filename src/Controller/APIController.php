<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\RecetteRepository;

class APIController extends AbstractController
{
    /**
     * @Route("/a/p/i", name="a_p_i")
     */
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'APIController',
        ]);
    }

    /**
    * @Route("/api/recette", name="api_recette")
    */
    public function index(RecetteRepository $recetteRepository): Response
    {
    $recettes = $recetteRepository->findAll();
    $json = json_encode($recettes);
    $reponse = new Response($json, 200, [
    'content-type' => 'application/json'
    ]);
    return $reponse;
}
}

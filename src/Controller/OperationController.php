<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\OperationRepository;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class OperationController extends AbstractController
{
    /**
    * @Route("/api/operation", name="api_operation" , methods="GET")
    */
    public function index(OperationRepository $operationRepository,NormalizerInterface $normalizer): Response
    {
        $operations = $operationRepository->findAll();
        $normalized = $normalizer->normalize($operations, null, ['groups'=>'operation:read']);
        $json = json_encode($normalized);
        $reponse = new Response($json, 200, ['content-type' => 'application/json']);
        return $reponse;
    }

    /**
    * @Route("/api/operation/{id}", name="api_operation_avec_id" , methods="GET")
    */
    public function findById(OperationRepository $operationRepository,$id,NormalizerInterface $normalizer): Response
    {
        $operation = $operationRepository->find($id);
        $normalized = $normalizer->normalize($operation, null, ['groups'=>'operation:read']);
        $json = json_encode($normalized);
        $reponse = new Response($json, 200, ['content-type' => 'application/json']);
        return $reponse;
    }
}

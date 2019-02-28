<?php

namespace App\Controller;


use App\Component\JsonResponse;
use App\Repository\ResponsibleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/responsible")
 */
final class ResponsibleController
{
    /**
     * @Route("/all", methods={"GET"})
     * @param ResponsibleRepository $repository
     * @return Response
     */
    public function getAll(ResponsibleRepository $repository): Response
    {
        return new JsonResponse($repository->findAll());
    }
}
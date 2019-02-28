<?php

namespace App\Controller;


use App\Component\JsonResponse;
use App\Repository\BusinessUnitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/business-unit")
 */
final class BusinessUnitController
{
    /**
     * @Route("/all", methods={"GET"})
     * @param BusinessUnitRepository $repository
     * @return Response
     */
    public function getAll(BusinessUnitRepository $repository): Response
    {
        return new JsonResponse($repository->findAll());
    }
}
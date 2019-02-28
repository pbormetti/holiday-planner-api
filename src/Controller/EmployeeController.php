<?php

namespace App\Controller;


use App\Component\JsonResponse;
use App\Repository\EmployeeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/employee")
 */
final class EmployeeController
{
    /**
     * @Route("/all", methods={"GET"})
     * @param EmployeeRepository $repository
     * @return Response
     */
    public function getAll(EmployeeRepository $repository): Response
    {
        return new JsonResponse($repository->findAll());
    }
}
<?php

namespace App\Repository;


use App\Entity\Employee;
use Doctrine\ORM\EntityManagerInterface;

final class EmployeeRepository
{
    private $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository(Employee::class);
    }

    /**
     * @return Employee[]
     */
    public function findAll(): array
    {
        return $this->repository->findAll();
    }
}
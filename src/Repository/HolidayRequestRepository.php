<?php

namespace App\Repository;


use App\Entity\HolidayRequest;
use Doctrine\ORM\EntityManagerInterface;

final class HolidayRequestRepository
{
    private $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository(HolidayRequest::class);
    }

    /**
     * @return HolidayRequest[]
     */
    public function findAll(): array
    {
        return $this->repository->findAll();
    }

    public function find(int $id): ?HolidayRequest
    {
        return $this->repository->find($id);
    }
}
<?php

namespace App\Repository;


use App\Entity\Responsible;
use Doctrine\ORM\EntityManagerInterface;

final class ResponsibleRepository
{
    private $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository(Responsible::class);
    }

    /**
     * @return Responsible[]
     */
    public function findAll(): array
    {
        return $this->repository->findAll();
    }
}
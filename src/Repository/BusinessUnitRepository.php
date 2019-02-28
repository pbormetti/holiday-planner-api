<?php declare(strict_types=1);

namespace App\Repository;


use App\Entity\BusinessUnit;
use Doctrine\ORM\EntityManagerInterface;

final class BusinessUnitRepository
{
    private $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository(BusinessUnit::class);
    }

    /**
     * @return BusinessUnit[]
     */
    public function findAll(): array
    {
        return $this->repository->findAll();
    }
}
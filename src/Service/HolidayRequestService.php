<?php

namespace App\Service;


use App\Entity\HolidayRequest;
use App\Form\Action\Action;
use App\Form\Action\AddHolidayRequestAction;
use App\Form\Action\EditHolidayRequestAction;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class HolidayRequestService
{
    private $validator;
    private $entityManager;

    public function __construct(ValidatorInterface $validator, EntityManagerInterface $entityManager)
    {
        $this->validator = $validator;
        $this->entityManager = $entityManager;
    }

    public function add(AddHolidayRequestAction $action): HolidayRequest
    {
        if ($this->isActionValid($action) === false)
            throw new \InvalidArgumentException();

        $holidayRequest = new HolidayRequest();
        $holidayRequest->setEmployee($action->getEmployee());
        $holidayRequest->setStart($action->getStart());
        $holidayRequest->setEnd($action->getEnd());
        $holidayRequest->setBusinessUnit($action->getBusinessUnit());
        $holidayRequest->setNote($action->getNote());
        $holidayRequest->setResponsible1($action->getResponsible1());
        $holidayRequest->setResponsible2($action->getResponsible2());

        $this->entityManager->persist($holidayRequest);
        $this->entityManager->flush();

        return $holidayRequest;
    }

    private function isActionValid(Action $action): bool
    {
        return count($this->validator->validate($action)) === 0;
    }

    public function edit(HolidayRequest $holidayRequest, EditHolidayRequestAction $action): void
    {
        if ($this->isActionValid($action) === false)
            throw new \InvalidArgumentException();

        $holidayRequest->setNote($action->getNote());

        $this->entityManager->persist($holidayRequest);
        $this->entityManager->flush();
    }

    public function approve1(HolidayRequest $holidayRequest): void
    {
        $holidayRequest->setApprovedBy1();

        $this->entityManager->persist($holidayRequest);
        $this->entityManager->flush();
    }

    public function approve2(HolidayRequest $holidayRequest): void
    {
        $holidayRequest->setApprovedBy2();

        $this->entityManager->persist($holidayRequest);
        $this->entityManager->flush();
    }
}
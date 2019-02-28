<?php

namespace App\Form\Action;


use App\Entity\BusinessUnit;
use App\Entity\Employee;
use App\Entity\Responsible;
use Symfony\Component\Validator\Constraints as Assert;

final class AddHolidayRequestAction implements Action
{
    /**
     * @var Employee
     * @Assert\NotNull()
     */
    private $employee;

    /**
     * @var \DateTime
     * @Assert\NotNull()
     * @Assert\GreaterThanOrEqual(value="today")
     * @Assert\LessThanOrEqual(propertyPath="end")
     */
    private $start;

    /**
     * @var \DateTime
     * @Assert\NotNull()
     * @Assert\GreaterThanOrEqual(propertyPath="start")
     */
    private $end;

    /**
     * @var BusinessUnit
     * @Assert\NotNull()
     */
    private $businessUnit;

    /**
     * @var string
     */
    private $note;

    /**
     * @var Responsible
     * @Assert\NotNull()
     * @Assert\NotEqualTo(propertyPath="responsible2")
     */
    private $responsible1;

    /**
     * @var Responsible
     * @Assert\NotNull()
     * @Assert\NotEqualTo(propertyPath="responsible1")
     */
    private $responsible2;

    /**
     * @return Employee
     */
    public function getEmployee(): ?Employee
    {
        return $this->employee;
    }

    /**
     * @param Employee $employee
     */
    public function setEmployee(Employee $employee): void
    {
        $this->employee = $employee;
    }

    /**
     * @return \DateTime
     */
    public function getStart(): ?\DateTime
    {
        return $this->start;
    }

    /**
     * @param \DateTime $start
     */
    public function setStart(\DateTime $start): void
    {
        $this->start = $start;
    }

    /**
     * @return \DateTime
     */
    public function getEnd(): ?\DateTime
    {
        return $this->end;
    }

    /**
     * @param \DateTime $end
     */
    public function setEnd(\DateTime $end): void
    {
        $this->end = $end;
    }

    /**
     * @return BusinessUnit
     */
    public function getBusinessUnit(): ?BusinessUnit
    {
        return $this->businessUnit;
    }

    /**
     * @param BusinessUnit $businessUnit
     */
    public function setBusinessUnit(BusinessUnit $businessUnit): void
    {
        $this->businessUnit = $businessUnit;
    }

    /**
     * @return string
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * @return Responsible
     */
    public function getResponsible1(): ?Responsible
    {
        return $this->responsible1;
    }

    /**
     * @param Responsible $responsible1
     */
    public function setResponsible1(Responsible $responsible1): void
    {
        $this->responsible1 = $responsible1;
    }

    /**
     * @return Responsible
     */
    public function getResponsible2(): ?Responsible
    {
        return $this->responsible2;
    }

    /**
     * @param Responsible $responsible2
     */
    public function setResponsible2(Responsible $responsible2): void
    {
        $this->responsible2 = $responsible2;
    }
}
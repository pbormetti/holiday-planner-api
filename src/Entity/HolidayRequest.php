<?php

namespace App\Entity;


use App\Entity\Constant\ApproveStatus;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class HolidayRequest
{
    private const NOTES_MAX_CHARACTERS_COUNT = 30;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", nullable=false)
     * @var int
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Employee")
     * @ORM\JoinColumn(nullable=false)
     * @var Employee
     */
    private $employee;

    /**
     * @ORM\Column(type="date", nullable=false)
     * @var \DateTime
     */
    private $start;

    /**
     * @ORM\Column(type="date", nullable=false)
     * @var \DateTime
     */
    private $end;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BusinessUnit")
     * @ORM\JoinColumn(nullable=false)
     * @var BusinessUnit
     */
    private $businessUnit;

    /**
     * @ORM\Column(type="string", length=35, nullable=true)
     * @var string
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Responsible")
     * @ORM\JoinColumn(nullable=false)
     * @var Responsible
     */
    private $responsible1;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     * @var bool
     */
    private $approvedBy1 = false;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Responsible")
     * @ORM\JoinColumn(nullable=false)
     * @var Responsible
     */
    private $responsible2;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     * @var bool
     */
    private $approvedBy2 = false;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Employee
     */
    public function getEmployee(): Employee
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
    public function getStart(): \DateTime
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
    public function getEnd(): \DateTime
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
    public function getBusinessUnit(): BusinessUnit
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
    public function getNote(): string
    {
        if (isset($this->note))
            return $this->note;

        return "";
    }

    /**
     * @param string $note
     */
    public function setNote(?string $note): void
    {
        if (isset($note) && strlen($note) > self::NOTES_MAX_CHARACTERS_COUNT)
            $note = substr($note, 0, self::NOTES_MAX_CHARACTERS_COUNT) . "...";

        $this->note = $note;
    }

    /**
     * @return Responsible
     */
    public function getResponsible1(): Responsible
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
     * @return bool
     */
    public function isApprovedBy1(): bool
    {
        return $this->approvedBy1;
    }

    public function setApprovedBy1(): void
    {
        $this->approvedBy1 = true;
    }

    /**
     * @return Responsible
     */
    public function getResponsible2(): Responsible
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

    /**
     * @return bool
     */
    public function isApprovedBy2(): bool
    {
        return $this->approvedBy2;
    }

    public function setApprovedBy2(): void
    {
        $this->approvedBy2 = true;
    }

    public function getApproved(): string
    {
        if ($this->approvedBy1 && $this->approvedBy2)
            return ApproveStatus::YES;

        if ($this->approvedBy1 || $this->approvedBy2)
            return ApproveStatus::PARTIALLY;

        return ApproveStatus::NO;
    }
}
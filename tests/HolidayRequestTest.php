<?php

namespace App\Tests;


use App\Entity\Constant\ApproveStatus;
use App\Entity\HolidayRequest;
use PHPUnit\Framework\TestCase;

class HolidayRequestTest extends TestCase
{
    public function testNoteShouldTruncateAt30CharactersIfLonger(): void
    {
        $holidayRequest = new HolidayRequest();
        $holidayRequest->setNote("This text is longer than 30 characters.");
        $this->assertSame("This text is longer than 30 ch...", $holidayRequest->getNote());

        $holidayRequest->setNote("This text is shorter.");
        $this->assertSame("This text is shorter.", $holidayRequest->getNote());

        $holidayRequest->setNote("This text is exactly 30 chars.");
        $this->assertSame("This text is exactly 30 chars.", $holidayRequest->getNote());
    }

    public function testNoteAcceptsNullInput(): void
    {
        $holidayRequest = new HolidayRequest();
        $holidayRequest->setNote(null);
        $this->assertSame("", $holidayRequest->getNote());
    }

    public function testApproveCombinations(): void
    {
        $approvedHolidayRequest = new HolidayRequest();
        $approvedHolidayRequest->setApprovedBy1();
        $approvedHolidayRequest->setApprovedBy2();
        $this->assertSame(ApproveStatus::YES, $approvedHolidayRequest->getApproved());

        $partiallyApprovedHolidayRequestCaseOne = new HolidayRequest();
        $partiallyApprovedHolidayRequestCaseOne->setApprovedBy1();
        $this->assertSame(ApproveStatus::PARTIALLY, $partiallyApprovedHolidayRequestCaseOne->getApproved());

        $partiallyApprovedHolidayRequestCaseTwo = new HolidayRequest();
        $partiallyApprovedHolidayRequestCaseTwo->setApprovedBy2();
        $this->assertSame(ApproveStatus::PARTIALLY, $partiallyApprovedHolidayRequestCaseTwo->getApproved());

        $notApprovedHolidayRequest = new HolidayRequest();
        $this->assertSame(ApproveStatus::NO, $notApprovedHolidayRequest->getApproved());
    }
}

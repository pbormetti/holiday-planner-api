<?php

namespace App\Form\Action;


final class EditHolidayRequestAction implements Action
{
    /**
     * @var string
     */
    private $note;

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
}
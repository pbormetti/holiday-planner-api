<?php

namespace App\Component;


final class ErrorMessage
{
    /**
     * @var int
     */
    private $statusCode;

    /**
     * @var string
     */
    private $message;

    public function __construct(int $statusCode, string $message)
    {
        $this->statusCode = $statusCode;
        $this->message = $message;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}
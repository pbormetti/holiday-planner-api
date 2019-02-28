<?php

namespace App\EventSubscriber;


use App\Component\ErrorMessage;
use App\Component\JsonResponse;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\KernelEvents;

final class ExceptionSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::EXCEPTION => [
                ["processException", 0]
            ]
        ];
    }

    public function processException(GetResponseForExceptionEvent $event): void
    {
        $exception = $event->getException();

        $statusCode = 500;
        if ($exception instanceof HttpExceptionInterface)
            $statusCode = $exception->getStatusCode();

        $errorMessage = new ErrorMessage($statusCode, $exception->getMessage());

        $event->setResponse(new JsonResponse($errorMessage, $statusCode));
    }
}
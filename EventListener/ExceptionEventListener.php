<?php

namespace Betsol\Bundle\SimpleApiBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;


/**
 * This kernel event listener will transform any exception into a proper JSON response object.
 */
class ExceptionEventListener extends EventListener
{
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        if (!$this->isListenerEnabledForRequest($event->getRequest())) {
            return;
        }

        $exception = $event->getException();

        $convertedResponse = $this->responseConverter->convertException($exception);

        $event->setResponse($convertedResponse);
    }
}

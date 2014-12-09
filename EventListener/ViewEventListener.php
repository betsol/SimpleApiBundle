<?php

namespace Betsol\Bundle\SimpleApiBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Betsol\Bundle\SimpleApiBundle\Response\Response;


/**
 * This kernel event listener will transform data, received from the controller,
 * into a proper JSON response object.
 */
class ViewEventListener extends EventListener
{
    /**
     * @param GetResponseForControllerResultEvent $event
     */
    public function onKernelView(GetResponseForControllerResultEvent $event)
    {
        if (!$this->isListenerEnabledForRequest($event->getRequest())) {
            return;
        }

        $controllerResult = $event->getControllerResult();

        if ($controllerResult instanceof Response) {
            $convertedResponse = $this->responseConverter->convertResponse($controllerResult);
            $event->setResponse($convertedResponse);
        }
    }
}

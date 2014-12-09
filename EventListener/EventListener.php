<?php

namespace Betsol\Bundle\SimpleApiBundle\EventListener;

use Betsol\Bundle\SimpleApiBundle\ResponseConverter;
use Symfony\Component\HttpFoundation\Request;


class EventListener
{
    /** @var  ResponseConverter */
    protected $responseConverter;

    /** @var  bool */
    protected $enabledForAllControllers = false;


    /**
     * @param ResponseConverter $responseConverter
     */
    public function __construct(ResponseConverter $responseConverter)
    {
        $this->responseConverter = $responseConverter;
    }

    /**
     * @param bool $enabledForAllControllers
     */
    public function setEnabledForAllControllers($enabledForAllControllers)
    {
        $this->enabledForAllControllers = (bool) $enabledForAllControllers;
    }

    /**
     * @param Request $request
     *
     * @return bool
     */
    public function isListenerEnabledForRequest(Request $request)
    {
        // Checking for annotation presence.
        $isEnabled = $request->attributes->has('_simple-api.enable');
        $isDisabled = $request->attributes->has('_simple-api.disable');

        return ($this->enabledForAllControllers || $isEnabled) && !$isDisabled;
    }
}

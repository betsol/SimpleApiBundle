<?php

namespace Betsol\Bundle\SimpleApiBundle\Response;

use Symfony\Component\HttpFoundation\ResponseHeaderBag;


class Response
{
    /** @var array */
    protected $metaData = [];

    /** @var array */
    protected $events = [];

    /** @var ResponseHeaderBag */
    public $headers;


    /**
     * @param string $name
     * @param mixed $value
     */
    public function addMetaItem($name, $value)
    {
        $this->metaData[$name] = $value;
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public function hasMetaItem($name)
    {
        return isset($this->metaData[$name]);
    }

    /**
     * @param string $name
     */
    public function deleteMetaItem($name)
    {
        unset($this->metaData[$name]);
    }

    /**
     * @return array
     */
    public function getAllMetaItems()
    {
        return $this->metaData;
    }

    /**
     * @param string $type
     * @param mixed $data
     */
    public function triggerEvent($type, $data = [])
    {
        if (!isset($this->events[$type])) {
            $this->events[$type] = [];
        }

        $this->events[$type][] = $data;
    }

    /**
     * @param string $type
     *
     * @return bool
     */
    public function hasEventsWithType($type)
    {
        return isset($this->events[$type]);
    }

    public function clearEvents()
    {
        $this->events = [];
    }


    /**
     * @param string $type
     */
    public function clearEventsByType($type)
    {
        unset($this->events[$type]);
    }

    /**
     * @param string $type
     *
     * @return array
     */
    public function getEventsByType($type)
    {
        if (!$this->hasEventsWithType($type)) {
            return [];
        }

        return $this->events[$type];
    }

    /**
     * @return array
     */
    public function getAllEvents()
    {
        return $this->events;
    }
}
<?php

namespace Betsol\Bundle\SimpleApiBundle\Response;


class ItemResponse extends Response
{
    /** @var  array */
    protected $item;


    /**
     * @param array $item
     */
    public function __construct(array $item = [])
    {
        $this->item = $item;
    }

    /**
     * @return array
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param array $item
     */
    public function setItem(array $item)
    {
        $this->item = $item;
    }
}
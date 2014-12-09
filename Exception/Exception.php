<?php

namespace Betsol\Bundle\SimpleApiBundle\Exception;


class Exception extends \Exception
{
    /** @var  string */
    protected $type;


    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}
<?php

namespace Betsol\Bundle\SimpleApiBundle\Response;


class ListResponse extends Response
{
    /** @var  array */
    protected $list = [];

    /** @var  int */
    protected $offset = null;

    /** @var  int */
    protected $totalCount = null;


    /**
     * @param array $list
     */
    public function __construct(array $list = [])
    {
        $this->list = $list;
    }

    /**
     * @return array
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * @param array $list
     */
    public function setList(array $list)
    {
        $this->list = $list;
    }

    /**
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     */
    public function setOffset($offset)
    {
        $this->offset = (int) $offset;
    }

    /**
     * @return int
     */
    public function getTotalCount()
    {
        return $this->totalCount;
    }

    /**
     * @param int $totalCount
     */
    public function setTotalCount($totalCount)
    {
        $this->totalCount = (int) $totalCount;
    }
}

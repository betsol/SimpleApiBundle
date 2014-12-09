<?php

namespace Betsol\Bundle\SimpleApiBundle\ResponseFormatter;

use Betsol\Bundle\SimpleApiBundle\Response\ListResponse;
use Betsol\Bundle\SimpleApiBundle\Response\Response;


class ListResponseFormatter extends ResponseFormatter
{
    /**
     * @inheritdoc
     *
     * @param Response $response
     *
     * @return array
     */
    public function format(Response $response)
    {
        $result = parent::format($response);

        if ($response instanceof ListResponse) {

            $result['data'] = $response->getList();

            // Pagination.
            $result['meta']['pagination'] = [];

            // Offset.
            if (null !== $response->getOffset()) {
                $result['meta']['pagination']['offset'] = $response->getOffset();
            }

            // Count.
            $result['meta']['pagination']['count'] = count($response->getList());

            // Total count.
            if (null !== $response->getTotalCount()) {
                $result['meta']['pagination']['totalCount'] = $response->getTotalCount();
            }
        }

        return $result;
    }
}

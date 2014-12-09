<?php

namespace Betsol\Bundle\SimpleApiBundle\ResponseFormatter;

use Betsol\Bundle\SimpleApiBundle\Response\ItemResponse;
use Betsol\Bundle\SimpleApiBundle\Response\Response;


class ItemResponseFormatter extends ResponseFormatter
{
    /**
     * @inheritdoc;
     *
     * @param Response $response
     *
     * @return array
     */
    public function format(Response $response)
    {
        $result = parent::format($response);

        if ($response instanceof ItemResponse) {
            $result['data'] = $response->getItem();
        }

        return $result;
    }
}

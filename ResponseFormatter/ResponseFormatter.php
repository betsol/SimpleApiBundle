<?php

namespace Betsol\Bundle\SimpleApiBundle\ResponseFormatter;

use Betsol\Bundle\SimpleApiBundle\Response\Response;


/**
 * This class formats response as a simple array.
 */
class ResponseFormatter
{
    /**
     * @param Response $response
     *
     * @return array
     */
    public function format(Response $response)
    {
        return [
            'success' => true,
            'meta'    => $response->getAllMetaItems(),
            'events'  => $response->getAllEvents(),
        ];
    }
}
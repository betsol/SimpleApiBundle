<?php

namespace Betsol\Bundle\SimpleApiBundle;

use Betsol\Bundle\SimpleApiBundle\Exception\Exception;


class ExceptionFormatter
{
    /**
     * @param \Exception $exception
     *
     * @return array
     */
    public function format(\Exception $exception)
    {
        $result = [
            'success' => false,
            'exception' => [
                'code'    => $exception->getCode(),
                'message' => $exception->getMessage(),
                'class'   => get_class($exception),
            ],
        ];

        if ($exception instanceof Exception) {
            $result['exception']['type'] = $exception->getType();
        }

        return $result;
    }
}

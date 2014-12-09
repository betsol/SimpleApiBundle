<?php

namespace Betsol\Bundle\SimpleApiBundle;

use Betsol\Bundle\SimpleApiBundle\Response\Response;
use Betsol\Bundle\SimpleApiBundle\ResponseFormatter\ResponseFormatter;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;


class ResponseConverter
{
    /** @var  SerializerInterface */
    protected $serializer;


    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param Response $response
     *
     * @return JsonResponse
     */
    public function convertResponse(Response $response)
    {
        // Using serializer to convert response to simple array.
        $responseFormatter = $this->getResponseFormatter($response);
        $responseArray = $responseFormatter->format($response);

        return $this->arrayToResponse($responseArray);
    }

    /**
     * @param \Exception $exception
     *
     * @return JsonResponse
     */
    public function convertException(\Exception $exception)
    {
        $exceptionFormatter = new ExceptionFormatter;
        $responseArray = $exceptionFormatter->format($exception);
        
        return $this->arrayToResponse($responseArray);
    }

    /**
     * @param array $responseArray
     *
     * @return JsonResponse
     */
    protected function arrayToResponse(array $responseArray)
    {
        // Using JMS serializer to convert simple array to JSON string.
        $jsonString = $this->serializer->serialize($responseArray, 'json');

        $jsonResponse = new JsonResponse;
        $jsonResponse->setContent($jsonString);

        return $jsonResponse;
    }

    /**
     * @param Response $response
     *
     * @return ResponseFormatter
     */
    protected function getResponseFormatter(Response $response)
    {
        $reflectionClass = new \ReflectionClass($response);

        $responseClassName = $reflectionClass->getShortName();

        if (!class_exists($this->getResponseFormatterFQCN($responseClassName))) {
            $responseClassName = 'Response';
        }

        $formatterFQCN = $this->getResponseFormatterFQCN($responseClassName);

        return (new $formatterFQCN);
    }

    /**
     * @param string $responseClassName
     *
     * @return string
     */
    protected function getResponseFormatterFQCN($responseClassName)
    {
        return 'Betsol\Bundle\SimpleApiBundle\\ResponseFormatter\\' . $responseClassName . 'Formatter';
    }
}

<?php

namespace App\Component;


use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

final class JsonResponse extends \Symfony\Component\HttpFoundation\JsonResponse
{
    public function __construct($data = null, int $status = 200, array $headers = [])
    {
        parent::__construct($data, $status, $headers, false);
    }

    public function setData($data = []): void
    {
        $normalizers = [new GetSetMethodNormalizer()];
        $encoders = [new JsonEncoder()];
        $serializer = new Serializer($normalizers, $encoders);

        $json = $serializer->serialize($data, "json");
        $this->setJson($json);
    }
}
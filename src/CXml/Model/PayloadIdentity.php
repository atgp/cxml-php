<?php

namespace CXml\Model;

class PayloadIdentity
{
    private $payloadId;
    private $timestamp;

    public function __construct(string $payloadId, \DateTimeInterface $timestamp = null)
    {
        $this->payloadId = $payloadId;
        $this->timestamp = $timestamp ?? new \DateTime();
    }

    public function getPayloadId(): string
    {
        return $this->payloadId;
    }

    public function getTimestamp(): \DateTimeInterface
    {
        return $this->timestamp;
    }
}

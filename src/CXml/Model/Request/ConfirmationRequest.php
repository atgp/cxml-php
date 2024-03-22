<?php

namespace CXml\Model\Request;

use CXml\Model\OrderReference;
use JMS\Serializer\Annotation as Ser;

class ConfirmationRequest implements RequestPayloadInterface
{
    /**
     * @Ser\SerializedName("ConfirmationHeader")
     */
    private $confirmationHeader;

    /**
     * @Ser\SerializedName("OrderReference")
     */
    private $orderReference;

    public function __construct(ConfirmationHeader $confirmationHeader, OrderReference $orderReference)
    {
        $this->confirmationHeader = $confirmationHeader;
        $this->orderReference = $orderReference;
    }

    public static function create(ConfirmationHeader $confirmationHeader, OrderReference $orderReference): self
    {
        return new self($confirmationHeader, $orderReference);
    }

    public function getConfirmationHeader(): ConfirmationHeader
    {
        return $this->confirmationHeader;
    }

    public function getOrderReference(): OrderReference
    {
        return $this->orderReference;
    }
}

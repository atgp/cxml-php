<?php

namespace CXml\Model;

use JMS\Serializer\Annotation as Ser;

class ShipNoticePortion
{
    /**
     * @Ser\SerializedName("OrderReference")
     */
    private $orderReference;

    public function __construct(string $documentReference, string $orderId = null, \DateTimeInterface $orderDate = null)
    {
        $this->orderReference = new OrderReference(
            new DocumentReference(
                $documentReference
            ),
            $orderId,
            $orderDate
        );
    }

    public function getOrderReference(): OrderReference
    {
        return $this->orderReference;
    }
}

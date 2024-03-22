<?php

namespace CXml\Model;

use JMS\Serializer\Annotation as Ser;

class SupplierOrderInfo
{
    /**
     * @Ser\XmlAttribute
     * @Ser\SerializedName("orderID")
     */
    private $orderId;

    /**
     * @Ser\XmlAttribute
     */
    private $orderDate;

    public function __construct(string $orderId, \DateTimeInterface $orderDate = null)
    {
        $this->orderId = $orderId;
        $this->orderDate = $orderDate;
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->orderDate;
    }
}

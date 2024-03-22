<?php

namespace CXml\Model\Message;

use Assert\Assertion;
use CXml\Model\MoneyWrapper;
use CXml\Model\Shipping;
use CXml\Model\ShipTo;
use CXml\Model\SupplierOrderInfo;
use CXml\Model\Tax;
use JMS\Serializer\Annotation as Ser;

class PunchOutOrderMessageHeader
{
    public const OPERATION_CREATE = 'create';
    public const OPERATION_EDIT = 'edit';
    public const OPERATION_INSPECT = 'inspect';

    /**
     * @Ser\XmlAttribute
     */
    private $operationAllowed = null;

    /**
     * @Ser\SerializedName("Total")
     */
    private $total;

    /**
     * @Ser\SerializedName("ShipTo")
     */
    private $shipTo = null;

    /**
     * @Ser\SerializedName("Shipping")
     */
    private $shipping = null;

    /**
     * @Ser\SerializedName("Tax")
     */
    private $tax = null;

    /**
     * @Ser\SerializedName("SupplierOrderInfo")
     */
    private $supplierOrderInfo = null;

    public function __construct(MoneyWrapper $total, Shipping $shipping = null, Tax $tax = null, string $operationAllowed = null)
    {
        Assertion::inArray($operationAllowed, [self::OPERATION_CREATE, self::OPERATION_EDIT, self::OPERATION_INSPECT, null]);

        $this->total = $total;
        $this->shipping = $shipping;
        $this->tax = $tax;
        $this->operationAllowed = $operationAllowed ?? self::OPERATION_CREATE;
    }

    public function setShipTo(?ShipTo $shipTo): self
    {
        $this->shipTo = $shipTo;

        return $this;
    }

    public function getShipTo(): ?ShipTo
    {
        return $this->shipTo;
    }

    public function setSupplierOrderInfo(string $orderId, \DateTimeInterface $orderDate = null): self
    {
        $this->supplierOrderInfo = new SupplierOrderInfo($orderId, $orderDate);

        return $this;
    }

    public function getOperationAllowed(): ?string
    {
        return $this->operationAllowed;
    }

    public function getTotal(): MoneyWrapper
    {
        return $this->total;
    }

    public function getShipping(): ?Shipping
    {
        return $this->shipping;
    }

    public function getTax(): ?Tax
    {
        return $this->tax;
    }

    public function getSupplierOrderInfo(): ?SupplierOrderInfo
    {
        return $this->supplierOrderInfo;
    }
}

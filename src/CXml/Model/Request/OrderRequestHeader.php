<?php

namespace CXml\Model\Request;

use Assert\Assertion;
use CXml\Model\BillTo;
use CXml\Model\CommentsTrait;
use CXml\Model\Contact;
use CXml\Model\ExtrinsicsTrait;
use CXml\Model\IdReferencesTrait;
use CXml\Model\MoneyWrapper;
use CXml\Model\Shipping;
use CXml\Model\ShipTo;
use CXml\Model\SupplierOrderInfo;
use CXml\Model\Tax;
use JMS\Serializer\Annotation as Ser;

class OrderRequestHeader
{
    use CommentsTrait;
    use IdReferencesTrait;
    use ExtrinsicsTrait;

    public const TYPE_NEW = 'new';

    /**
     * @Ser\XmlAttribute
     * @Ser\SerializedName("orderID")
     */
    private $orderId;

    /**
     * @Ser\XmlAttribute
     * @Ser\SerializedName("orderDate")
     */
    private $orderDate;

    /**
     * @Ser\XmlAttribute
     */
    private $type = self::TYPE_NEW;

    /**
     * @Ser\XmlElement
     * @Ser\SerializedName("Total")
     */
    private $total;

    /**
     * @Ser\XmlElement
     * @Ser\SerializedName("ShipTo")
     */
    private $shipTo = null;

    /**
     * @Ser\XmlElement
     * @Ser\SerializedName("BillTo")
     */
    private $billTo;

    /**
     * @Ser\XmlElement
     * @Ser\SerializedName("Shipping")
     */
    private $shipping = null;

    /**
     * @Ser\XmlElement
     * @Ser\SerializedName("Tax")
     */
    private $tax = null;

    /**
     * @Ser\XmlList(inline=true, entry="Contact")
     * @Ser\Type("array<CXml\Model\Contact>")
     *
     * @var Contact[]
     */
    private $contacts = null;

    /**
     * @Ser\SerializedName("SupplierOrderInfo")
     */
    private $supplierOrderInfo = null;

    public function __construct(
        string $orderId,
        \DateTimeInterface $orderDate,
        ?ShipTo $shipTo,
        BillTo $billTo,
        MoneyWrapper $total,
        string $type = self::TYPE_NEW,
        array $contacts = null
    ) {
        if ($contacts) {
            Assertion::allIsInstanceOf($contacts, Contact::class);
        }

        $this->orderId = $orderId;
        $this->orderDate = $orderDate;
        $this->type = $type;
        $this->total = $total;
        $this->shipTo = $shipTo;
        $this->billTo = $billTo;
        $this->contacts = $contacts;
    }

    public static function create(
        string $orderId,
        \DateTimeInterface $orderDate,
        ?ShipTo $shipTo,
        BillTo $billTo,
        MoneyWrapper $total,
        string $type = self::TYPE_NEW,
        array $contacts = null
    ): self {
        return new self($orderId, $orderDate, $shipTo, $billTo, $total, $type, $contacts);
    }

    public function getShipping(): ?Shipping
    {
        return $this->shipping;
    }

    public function setShipping(?Shipping $shipping): self
    {
        $this->shipping = $shipping;

        return $this;
    }

    public function getTax(): ?Tax
    {
        return $this->tax;
    }

    public function setTax(?Tax $tax): self
    {
        $this->tax = $tax;

        return $this;
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function getOrderDate(): \DateTimeInterface
    {
        return $this->orderDate;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getTotal(): MoneyWrapper
    {
        return $this->total;
    }

    public function getShipTo(): ?ShipTo
    {
        return $this->shipTo;
    }

    public function getBillTo(): BillTo
    {
        return $this->billTo;
    }

    public function getComments(): ?array
    {
        return $this->comments;
    }

    public function addContact(Contact $contact): self
    {
        if (null === $this->contacts) {
            $this->contacts = [];
        }

        $this->contacts[] = $contact;

        return $this;
    }

    public function getContacts(): ?array
    {
        return $this->contacts;
    }

    public function getSupplierOrderInfo(): ?SupplierOrderInfo
    {
        return $this->supplierOrderInfo;
    }
}

<?php

namespace CXml\Model\Message;

use Assert\Assertion;
use CXml\Model\CommentsTrait;
use CXml\Model\Contact;
use CXml\Model\ExtrinsicsTrait;
use CXml\Model\MoneyWrapper;
use CXml\Model\OrganizationId;
use CXml\Model\ShipTo;
use JMS\Serializer\Annotation as Ser;

class QuoteMessageHeader
{
    use CommentsTrait;
    use ExtrinsicsTrait;

    public const TYPE_ACCEPT = 'accept';
    public const TYPE_REJECT = 'reject';
    public const TYPE_UPDATE = 'update';
    public const TYPE_FINAL = 'final';
    public const TYPE_AWARD = 'award';

    /**
     * @Ser\SerializedName("type")
     * @Ser\XmlAttribute
     */
    private $type;

    /**
     * @Ser\SerializedName("quoteID")
     * @Ser\XmlAttribute
     */
    private $quoteId;

    /**
     * @Ser\XmlAttribute
     */
    private $quoteDate;

    /**
     * @Ser\XmlAttribute
     */
    private $currency;

    /**
     * @Ser\XmlAttribute(namespace="http://www.w3.org/XML/1998/namespace")
     */
    private $lang;

    /**
     * @Ser\SerializedName("OrganizationID")
     * @Ser\XmlElement (cdata=false)
     */
    private $organizationId;

    /**
     * @Ser\SerializedName("Total")
     * @Ser\XmlElement (cdata=false)
     */
    private $total;

    /**
     * @Ser\SerializedName("ShipTo")
     * @Ser\XmlElement (cdata=false)
     */
    private $shipTo;

    /**
     * @Ser\SerializedName("Contact")
     * @Ser\XmlElement (cdata=false)
     */
    private $contact;

    public function __construct(OrganizationId $organizationId, MoneyWrapper $total, string $type, string $quoteId, \DateTime $quoteDate, string $currency, string $lang = 'en')
    {
        Assertion::inArray($type, [
            self::TYPE_ACCEPT,
            self::TYPE_REJECT,
            self::TYPE_UPDATE,
            self::TYPE_FINAL,
            self::TYPE_AWARD,
        ]);

        $this->organizationId = $organizationId;
        $this->total = $total;
        $this->type = $type;
        $this->quoteId = $quoteId;
        $this->quoteDate = $quoteDate;
        $this->currency = $currency;
        $this->lang = $lang;
    }

    public function setShipTo(ShipTo $shipTo): self
    {
        $this->shipTo = $shipTo;

        return $this;
    }

    public function setContact(Contact $contact): self
    {
        $this->contact = $contact;

        return $this;
    }
}

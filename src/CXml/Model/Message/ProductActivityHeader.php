<?php

namespace CXml\Model\Message;

use JMS\Serializer\Annotation as Ser;

class ProductActivityHeader
{
    public const PROCESSTYPE_SUPPLIER_MANAGED_INVENTORY = 'SMI';
    public const PROCESSTYPE_THIRD_PARTY_LOGISTICS = '3PL';

    /**
     * @Ser\SerializedName("messageID")
     * @Ser\XmlAttribute
     */
    private $messageId;

    /**
     * @Ser\XmlAttribute
     */
    private $processType = null;

    /**
     * @Ser\XmlAttribute
     */
    private $creationDate = null;

    public function __construct(string $messageId, string $processType = null, \DateTimeInterface $creationDate = null)
    {
        $this->messageId = $messageId;
        $this->processType = $processType;
        $this->creationDate = $creationDate;
    }

    public function getMessageId(): string
    {
        return $this->messageId;
    }

    public function getProcessType(): ?string
    {
        return $this->processType;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }
}

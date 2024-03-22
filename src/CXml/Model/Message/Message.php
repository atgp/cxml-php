<?php

namespace CXml\Model\Message;

use CXml\Model\Status;
use JMS\Serializer\Annotation as Ser;

class Message
{
    /**
     * @Ser\SerializedName("Status")
     */
    private $status = null;

    /**
     * @Ser\XmlAttribute
     * @Ser\SerializedName("deploymentMode")
     */
    private $deploymentMode = null;

    /**
     * @Ser\XmlAttribute
     * @Ser\SerializedName("inReplyTo")
     */
    private $inReplyTo = null;

    /**
     * @Ser\XmlAttribute
     * @Ser\SerializedName("Id")
     */
    private $id = null;

    /**
     * @Ser\Exclude
     * see CXmlWrappingNodeJmsEventSubscriber
     */
    private $payload;

    public function __construct(
        MessagePayloadInterface $message,
        Status $status = null,
        string $id = null,
        string $deploymentMode = null,
        string $inReplyTo = null
    ) {
        $this->status = $status;
        $this->payload = $message;
        $this->deploymentMode = $deploymentMode;
        $this->inReplyTo = $inReplyTo;
        $this->id = $id;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function getDeploymentMode(): ?string
    {
        return $this->deploymentMode;
    }

    public function getInReplyTo(): ?string
    {
        return $this->inReplyTo;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getPayload(): MessagePayloadInterface
    {
        return $this->payload;
    }
}

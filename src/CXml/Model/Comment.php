<?php

namespace CXml\Model;

use JMS\Serializer\Annotation as Ser;

class Comment
{
    /**
     * @Ser\SerializedName("Attachment")
     */
    private $attachment = null;

    /**
     * @Ser\XmlValue(cdata=false)
     */
    private $value = null;

    /**
     * @Ser\XmlAttribute(namespace="http://www.w3.org/XML/1998/namespace")
     */
    private $lang = null;

    /**
     * @Ser\XmlAttribute()
     */
    private $type = null;

    public function __construct(string $value = null, string $type = null, string $lang = null, string $attachment = null)
    {
        $this->value = $value;
        $this->type = $type;
        $this->lang = $lang;
        $this->attachment = $attachment ? new Url($attachment) : null;
    }

    public function getAttachment(): ?Url
    {
        return $this->attachment;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function getLang(): ?string
    {
        return $this->lang;
    }

    public function getType(): ?string
    {
        return $this->type;
    }
}

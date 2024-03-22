<?php

namespace CXml\Model;

use JMS\Serializer\Annotation as Ser;

class MultilanguageString
{
    /**
     * @Ser\XmlValue(cdata=false)
     */
    private $value = null;

    /**
     * @Ser\XmlAttribute
     */
    private $type = null;

    /**
     * @Ser\XmlAttribute(namespace="http://www.w3.org/XML/1998/namespace")
     */
    private $lang = null;

    public function __construct(?string $value, string $type = null, string $lang = 'en')
    {
        $this->value = $value;
        $this->lang = $lang;
        $this->type = $type;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getLang(): ?string
    {
        return $this->lang;
    }
}

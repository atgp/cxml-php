<?php

namespace CXml\Model;

use JMS\Serializer\Annotation as Ser;

class Classification
{
    /**
     * @Ser\XmlAttribute
     */
    private $domain;

    /**
     * @Ser\XmlValue(cdata=false)
     */
    private $value;

    public function __construct(string $domain, string $value)
    {
        $this->domain = $domain;
        $this->value = $value;
    }
}

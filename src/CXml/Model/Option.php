<?php

namespace CXml\Model;

use JMS\Serializer\Annotation as Ser;

class Option
{
    /**
     * @Ser\XmlAttribute
     */
    private $name;

    /**
     * @Ser\XmlValue(cdata=false)
     */
    private $value;

    public function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }
}

<?php

namespace CXml\Model;

use JMS\Serializer\Annotation as Ser;

class ShippingContractNumber
{
    /**
     * @Ser\XmlValue(cdata=false)
     */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }
}

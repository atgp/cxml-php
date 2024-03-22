<?php

namespace CXml\Model;

use JMS\Serializer\Annotation as Ser;

class Money
{
    /**
     * @Ser\XmlAttribute
     */
    private $currency;

    /**
     * @Ser\XmlValue(cdata=false)
     */
    private $value;

    /**
     * @Ser\Exclude()
     */
    private $valueCent;

    public function __construct(string $currency, int $valueCent)
    {
        $this->currency = $currency;
        $this->valueCent = $valueCent;
        $this->value = \number_format($valueCent / 100, 2, '.', '');
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getValueCent(): int
    {
        return $this->valueCent ?? (int) (((float) $this->value) * 100);
    }
}

<?php

namespace CXml\Model;

use JMS\Serializer\Annotation as Ser;

class Transaction
{
    /**
     * @Ser\XmlAttribute
     */
    private $requestName;

    /**
     * @Ser\SerializedName("URL")
     * @Ser\XmlElement(cdata=false)
     */
    private $url;

    /**
     * @Ser\XmlList(inline=true, entry="Option")
     * @Ser\Type("array<CXml\Model\Option>")
     *
     * @var Option[]
     */
    private $options = [];

    public function __construct(string $requestName, string $url)
    {
        $this->requestName = $requestName;
        $this->url = $url;
    }

    public function addOption(Option $option): void
    {
        $this->options[] = $option;
    }
}

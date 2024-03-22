<?php

namespace CXml\Model;

use JMS\Serializer\Annotation as Ser;

class Url
{
    /**
     * @Ser\SerializedName("URL")
     * @Ser\XmlElement(cdata=false)
     */
    private $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}

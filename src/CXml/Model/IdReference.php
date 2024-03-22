<?php

namespace CXml\Model;

use JMS\Serializer\Annotation as Ser;

class IdReference
{
    /**
     * @Ser\XmlAttribute
     */
    private $domain;

    /**
     * @Ser\XmlAttribute
     */
    private $identifier;

    public function __construct(string $domain, string $identifier)
    {
        $this->domain = $domain;
        $this->identifier = $identifier;
    }

    public function getDomain(): string
    {
        return $this->domain;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }
}

<?php

namespace CXml\Model;

use JMS\Serializer\Annotation as Ser;

class Party
{
    /**
     * @Ser\SerializedName("Credential")
     */
    private $credential;

    /**
     * @Ser\SerializedName("UserAgent")
     * @Ser\XmlElement (cdata=false)
     */
    private $userAgent = null;

    public function __construct(Credential $credential, string $userAgent = null)
    {
        $this->credential = $credential;
        $this->userAgent = $userAgent;
    }

    public function getCredential(): Credential
    {
        return $this->credential;
    }

    public function getUserAgent(): ?string
    {
        return $this->userAgent;
    }
}

<?php

namespace CXml\Model;

use JMS\Serializer\Annotation as Ser;

class Credential
{
    /**
     * @Ser\XmlAttribute
     */
    private $domain;

    /**
     * @Ser\SerializedName("Identity")
     * @Ser\XmlElement (cdata=false)
     */
    private $identity;

    /**
     * @Ser\SerializedName("CredentialMac")
     * @Ser\XmlElement (cdata=false)
     */
    // private $credentialMac; TODO

    /**
     * @Ser\SerializedName("SharedSecret")
     * @Ser\XmlElement (cdata=false)
     */
    private $sharedSecret = null;

    public function __construct(string $domain, string $identity, string $sharedSecret = null)
    {
        $this->domain = $domain;
        $this->identity = $identity;
        $this->sharedSecret = $sharedSecret;
    }

    public function getDomain(): string
    {
        return $this->domain;
    }

    public function getIdentity(): string
    {
        return $this->identity;
    }

    public function getSharedSecret(): ?string
    {
        return $this->sharedSecret;
    }

    public function setSharedSecret(?string $sharedSecret): void
    {
        $this->sharedSecret = $sharedSecret;
    }

    public function __toString(): string
    {
        return \sprintf('%s@%s', $this->identity, $this->domain);
    }
}

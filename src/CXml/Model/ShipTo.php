<?php

namespace CXml\Model;

use JMS\Serializer\Annotation as Ser;

class ShipTo
{
    use IdReferencesTrait;

    /**
     * @Ser\SerializedName("Address")
     */
    private $address;

    /**
     * @Ser\XmlList(inline=true, entry="CarrierIdentifier")
     * @Ser\Type("array<CXml\Model\CarrierIdentifier>")
     *
     * @var CarrierIdentifier[]
     */
    private $carrierIdentifiers = [];

    /**
     * @Ser\SerializedName("TransportInformation")
     */
    private $transportInformation = null;

    public function __construct(Address $address, TransportInformation $transportInformation = null)
    {
        $this->address = $address;
        $this->transportInformation = $transportInformation;
    }

    public function addCarrierIdentifier(string $domain, string $identifier): self
    {
        $this->carrierIdentifiers[] = new CarrierIdentifier($domain, $identifier);

        return $this;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }
}

<?php

namespace CXml\Model;

use JMS\Serializer\Annotation as Ser;

class InventoryQuantity
{
    /**
     * @Ser\XmlAttribute
     */
    private $quantity;

    /**
     * @Ser\SerializedName("UnitOfMeasure")
     */
    private $unitOfMeasure;

    public function __construct(int $quantity, string $unitOfMeasure)
    {
        $this->quantity = $quantity;
        $this->unitOfMeasure = new UnitOfMeasure($unitOfMeasure);
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getUnitOfMeasure(): string
    {
        return $this->unitOfMeasure->getValue();
    }
}

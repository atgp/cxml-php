<?php

namespace CXml\Model;

use JMS\Serializer\Annotation as Ser;

class Inventory
{
    /**
     * @Ser\SerializedName("StockOnHandQuantity")
     */
    private $stockOnHandQuantity = null;

    /**
     * @Ser\SerializedName("IncrementQuantity")
     */
    private $incrementQuantity = null;

    public static function create(): self
    {
        return new self();
    }

    public function getStockOnHandQuantity(): ?InventoryQuantity
    {
        return $this->stockOnHandQuantity;
    }

    public function setStockOnHandQuantity(InventoryQuantity $stockOnHandQuantity): self
    {
        $this->stockOnHandQuantity = $stockOnHandQuantity;

        return $this;
    }

    public function getIncrementQuantity(): ?InventoryQuantity
    {
        return $this->incrementQuantity;
    }

    public function setIncrementQuantity(InventoryQuantity $incrementQuantity): self
    {
        $this->incrementQuantity = $incrementQuantity;

        return $this;
    }
}

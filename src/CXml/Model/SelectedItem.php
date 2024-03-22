<?php

namespace CXml\Model;

use JMS\Serializer\Annotation as Ser;

class SelectedItem
{
    /**
     * @Ser\SerializedName("ItemID")
     */
    private $itemId;

    public function __construct(ItemId $itemId)
    {
        $this->itemId = $itemId;
    }

    public function getItemId(): ItemId
    {
        return $this->itemId;
    }
}

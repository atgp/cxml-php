<?php

namespace CXml\Model\Request;

use CXml\Model\Extrinsic;
use CXml\Model\ExtrinsicsTrait;
use CXml\Model\ItemOut;
use CXml\Model\SelectedItem;
use CXml\Model\ShipTo;
use CXml\Model\Url;
use JMS\Serializer\Annotation as Ser;

class PunchOutSetupRequest implements RequestPayloadInterface
{
    use ExtrinsicsTrait;

    /**
     * @Ser\XmlAttribute
     */
    private $operation = null;

    /**
     * @Ser\SerializedName("BuyerCookie")
     */
    private $buyerCookie;

    /**
     * @Ser\XmlList(inline=true, entry="Extrinsic")
     * @Ser\Type("array<CXml\Model\Extrinsic>")
     *
     * @var Extrinsic[]
     */
    protected $extrinsics = [];

    /**
     * @Ser\SerializedName("BrowserFormPost")
     */
    private $browserFormPost;

    /**
     * @Ser\SerializedName("SupplierSetup")
     */
    private $supplierSetup;

    /**
     * @Ser\SerializedName("ShipTo")
     */
    private $shipTo = null;

    /**
     * @Ser\SerializedName("SelectedItem")
     */
    private $selectedItem = null;

    /**
     * @Ser\XmlList(inline=true, entry="ItemOut")
     * @Ser\Type("array<CXml\Model\ItemOut>")
     *
     * @var ItemOut[]
     */
    private $itemOut = [];

    public function __construct(string $buyerCookie, string $browserFormPost, string $supplierSetup, ShipTo $shipTo = null, SelectedItem $selectedItem = null, string $operation = 'create')
    {
        $this->operation = $operation;
        $this->buyerCookie = $buyerCookie;
        $this->browserFormPost = new Url($browserFormPost);
        $this->supplierSetup = new Url($supplierSetup);
        $this->shipTo = $shipTo;
        $this->selectedItem = $selectedItem;
    }

    public function getOperation(): ?string
    {
        return $this->operation;
    }

    public function getBuyerCookie(): string
    {
        return $this->buyerCookie;
    }

    public function getBrowserFormPost(): Url
    {
        return $this->browserFormPost;
    }

    public function getSupplierSetup(): Url
    {
        return $this->supplierSetup;
    }

    public function getShipTo(): ?ShipTo
    {
        return $this->shipTo;
    }

    public function getSelectedItem(): ?SelectedItem
    {
        return $this->selectedItem;
    }

    public function getItems(): array
    {
        return $this->itemOut;
    }

    public function addItems(array $items): self
    {
        foreach ($items as $item) {
            $this->addItem($item);
        }

        return $this;
    }

    public function addItem(ItemOut $item): self
    {
        $this->itemOut[] = $item;

        return $this;
    }
}

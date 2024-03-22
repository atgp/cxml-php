<?php

namespace CXml\Model\Response;

use CXml\Model\Option;
use CXml\Model\Transaction;
use JMS\Serializer\Annotation as Ser;

class ProfileResponse implements ResponsePayloadInterface
{
    /**
     * @Ser\XmlAttribute
     */
    private $effectiveDate;

    /**
     * @Ser\XmlAttribute
     */
    private $lastRefresh = null;

    /**
     * @Ser\XmlList(inline=true, entry="Option")
     * @Ser\Type("array<CXml\Model\Option>")
     *
     * @var Option[]
     */
    private $options = [];

    /**
     * @Ser\XmlList(inline=true, entry="Transaction")
     * @Ser\Type("array<CXml\Model\Transaction>")
     *
     * @var Transaction[]
     */
    private $transactions = [];

    public function __construct(\DateTimeInterface $effectiveDate = null, \DateTimeInterface $lastRefresh = null)
    {
        $this->effectiveDate = $effectiveDate ?? new \DateTime();
        $this->lastRefresh = $lastRefresh;
    }

    public function addTransaction(Transaction $transaction): void
    {
        $this->transactions[] = $transaction;
    }

    public function addOption(Option $option): void
    {
        $this->options[] = $option;
    }
}

<?php

namespace TestAssessment;

use TestAssessment\Contracts\Storage;

/**
 * Class PriceListStorage
 * @package TestAssessment
 */
class PriceListStorage implements Storage
{
    /**
     * @var array
     */
    private array $priceList;

    /**
     * PriceListStorage constructor.
     */
    public function __construct()
    {
        $this->priceList = [];
    }

    /**
     * @param  Price  $item
     * @return Storage
     */
    public function add($item): Storage
    {
        $this->priceList = array_merge($this->priceList, $item->getPrice());

        return $this;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->priceList;
    }
}
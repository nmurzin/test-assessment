<?php

namespace TestAssessment\Storages;

use TestAssessment\Contracts\Storage;

/**
 * Class PriceListStorage
 * @package TestAssessment
 */
class PriceList implements Storage
{
    /**
     * @var array
     */
    private array $priceList;

    /**
     * @param  Price  $priceItem
     * @return Storage
     */
    public function add($priceItem): Storage
    {
        $this->priceList[] = $priceItem;

        return $this;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->priceList;
    }

    /**
     * @param  string  $key
     * @return Price|void
     */
    public function getProductPrice(string $key)
    {
        foreach ($this->priceList as $price) {
            if ($price->getKey() !== $key) {
                continue;
            }

            return $price;
        }
    }
}
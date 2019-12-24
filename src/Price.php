<?php

namespace TestAssessment;

use TestAssessment\Contracts\Entity;

final class Price implements Entity
{
    /**
     * @var string
     */
    private string $key;

    /**
     * @var array
     */
    private array $prices;

    /**
     * Price constructor.
     * @param  string  $itemKey
     * @param  array  $prices
     */
    public function __construct(string $itemKey, array $prices)
    {
        $this->key = $itemKey;
        $this->prices = $prices;
    }

    /**
     * @return array
     */
    public function getPrice(): array
    {
        if ($this->key && $this->prices) {
            return [$this->key => $this->prices];
        }

        return [];
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return int
     */
    public function getBiggestQuantity(): int
    {
        return max(array_keys($this->prices));
    }

    /**
     * @return int
     */
    public function getLowestQuantity(): int
    {
        return min(array_keys($this->prices));
    }

    /**
     * @param  int  $productsCount
     * @return float
     */
    public function getPriceByCount(int $productsCount): float
    {
        if ($productsCount > 1) {
            $maxCountInPrice = $this->getBiggestQuantity();
            $maxPriceCount = floor($productsCount / $maxCountInPrice);
            $minPriceCount = $productsCount - ($maxPriceCount * $maxCountInPrice);

            return ($this->prices[$maxCountInPrice] * $maxPriceCount) + ($this->prices[$this->getLowestQuantity()] * $minPriceCount);
        }

        if ($productsCount === $this->getLowestQuantity()) {
            return $this->prices[$productsCount];
        }
    }
}
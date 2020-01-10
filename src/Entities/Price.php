<?php

namespace TestAssessment\Entities;

/**
 * Class Price
 * @package TestAssessment
 */
final class Price
{
    /**
     * @var string
     */
    private string $productKey;

    /**
     * @var array
     */
    private array $prices;

    /**
     * Price constructor.
     * @param  string  $productKey
     * @param  array  $prices
     */
    public function __construct(string $productKey, array $prices)
    {
        $this->productKey = $productKey;
        $this->prices = $prices;
    }

    /**
     * @return int
     */
    public function getBiggestProductQuantity(): int
    {
        return max(array_keys($this->prices));
    }

    /**
     * @return int
     */
    public function getLowestProductQuantity(): int
    {
        return min(array_keys($this->prices));
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->productKey;
    }

    /**
     * @param  int  $productsCount
     * @return float
     */
    public function calculateOptimalPriceByProductCount(int $productsCount): float
    {
        if ($productsCount > 1) {
            $maxCountInPrice = $this->getBiggestProductQuantity();
            $maxPriceCount = floor($productsCount / $maxCountInPrice);
            $minPriceCount = $productsCount - ($maxPriceCount * $maxCountInPrice);

            return ($this->prices[$maxCountInPrice] * $maxPriceCount) + ($this->prices[$this->getLowestProductQuantity()] * $minPriceCount);
        }

        if ($productsCount === $this->getLowestProductQuantity()) {
            return $this->prices[$productsCount];
        }
    }
}
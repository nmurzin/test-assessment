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
}
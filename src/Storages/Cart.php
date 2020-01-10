<?php

namespace TestAssessment\Storages;

use TestAssessment\Contracts\Storage;

/**
 * Class Cart
 * @package TestAssessment
 */
class Cart implements Storage
{
    /**
     * @var array
     */
    private array $cartProducts;

    /**
     * @param  string  $item
     * @return Storage
     */
    public function add($item): Storage
    {
        $this->cartProducts[] = $item;

        return $this;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->cartProducts;
    }

    /**
     * @return array
     */
    public function clear(): array
    {
        $this->cartProducts = [];

        return $this->cartProducts;
    }
}
<?php

namespace TestAssessment;

use TestAssessment\Contracts\Storage;

/**
 * Class CartStorage
 * @package TestAssessment
 */
class CartStorage implements Storage
{
    /**
     * @var array
     */
    private array $cartStorage;

    /**
     * @param  string  $item
     * @return Storage
     */
    public function add($item): Storage
    {
        $this->cartStorage[] = $item;

        return $this;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->cartStorage;
    }

    /**
     * @return array
     */
    public function clearCart(): array
    {
        $this->cartStorage = [];

        return $this->cartStorage;
    }
}
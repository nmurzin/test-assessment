<?php

namespace TestAssessment\Storages;

use TestAssessment\Contracts\Storage;
use TestAssessment\Exceptions\NotValidInputException;
use TestAssessment\Validators\PriceValidator;
use TestAssessment\Validators\CartValidator;

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
     * @param $item
     * @return Storage
     *
     * @throws NotValidInputException
     */
    public function add($item): Storage
    {
        PriceValidator::validateProductKey($item);
        CartValidator::validateProductKeyExistsInPriceList($item);

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
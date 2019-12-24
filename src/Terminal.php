<?php

namespace TestAssessment;

use TestAssessment\Contracts\Storage;
use TestAssessment\Contracts\Terminal as TerminalContract;

/**
 * Class Terminal
 * @package TestAssessment
 */
class Terminal implements TerminalContract
{
    /**
     * @var Storage
     */
    private Storage $cart;
    /**
     * @var Storage
     */
    private Storage $priceList;

    /**
     * Terminal constructor.
     * @param  Storage  $cart
     * @param  Storage  $priceList
     */
    public function __construct(Storage $cart, Storage $priceList)
    {
        $this->cart = $cart;
        $this->priceList = $priceList;
    }

    /**
     * @param  array  $pricing
     * @return Storage
     */
    public function setPricing(array $pricing): Storage
    {
        return $this->priceList;
    }

    /**
     * @param  string  $item
     * @return TerminalContract
     */
    public function scanItem(string $item): TerminalContract
    {
        $this->cart->add($item);

        return $this;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        // TODO: Implement getTotal() method.
    }

    public function getCartItems()
    {
        return $this->cart->getAll();
    }
}
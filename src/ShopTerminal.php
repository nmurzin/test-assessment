<?php

namespace TestAssessment;

use TestAssessment\Contracts\Entity;
use TestAssessment\Contracts\Storage;
use TestAssessment\Contracts\Terminal;
use TestAssessment\Entities\Price as PriceEntity;

/**
 * Class ShopTerminal
 * @package TestAssessment
 */
final class ShopTerminal implements Terminal
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
     * @param  PriceEntity  $price
     * @return Storage
     */
    public function setPricing(PriceEntity $price): Storage
    {
        $this->priceList->add($price);

        return $this->priceList;
    }

    /**
     * @param  string  $item
     * @return Terminal
     */
    public function scanItem(string $item): Terminal
    {
        $this->cart->add($item);

        return $this;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        $productsCountByType = [];
        $totalPrice = 0;

        foreach ($this->cart->getAll() as $cartItem) {
            if (!empty($productsCountByType[$cartItem])) {
                $productsCountByType[$cartItem]++;
                continue;
            }

            $productsCountByType[$cartItem] = 1;
        }

        foreach ($productsCountByType as $key => $count) {
            $priceByType = $this->priceList->getProductPrice($key);
            $totalPrice = $totalPrice + $priceByType->calculateOptimalPriceByProductCount($count);
        }

        return $totalPrice;
    }

    /**
     * @return $this
     */
    public function clearCart():Terminal
    {
        $this->cart->clear();

        return $this;
    }
}

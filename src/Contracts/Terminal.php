<?php

namespace TestAssessment\Contracts;

use TestAssessment\Entities\Price as PriceEntity;

/**
 * Interface Terminal
 * @package TestAssessment\Contracts
 */
interface Terminal
{

    /**
     * @param  PriceEntity  $price
     * @return Storage
     */
    public function setPricing(PriceEntity $price): Storage;

    /**
     * @param  string  $item
     * @return Terminal
     */
    public function scanItem(string $item): Terminal;

    /**
     * @return float
     */
    public function getTotal(): float;
}
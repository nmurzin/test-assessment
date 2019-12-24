<?php

namespace TestAssessment\Contracts;

/**
 * Interface Terminal
 * @package TestAssessment\Contracts
 */
interface Terminal
{
    /**
     * @param  array  $pricing
     * @return Storage
     */
    public function setPricing(array $pricing): Storage;

    /**
     * @param  string  $item
     * @return Storage
     */
    public function scanItem(string $item): Terminal;

    /**
     * @return float
     */
    public function getTotal(): float;
}
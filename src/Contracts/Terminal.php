<?php

namespace TestAssessment\Contracts;

/**
 * Interface Terminal
 * @package TestAssessment\Contracts
 */
interface Terminal
{
    /**
     * @param  Entity  $pricing
     * @return Storage
     */
    public function setPricing(Entity $pricing): Storage;

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
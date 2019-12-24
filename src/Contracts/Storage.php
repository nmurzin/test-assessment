<?php

namespace TestAssessment\Contracts;

/**
 * Interface Storage
 * @package TestAssessment\Contracts
 */
interface Storage
{
    /**
     * @param $item
     * @return Storage
     */
    public function add($item): Storage;

    /**
     * @return array
     */
    public function getAll(): array;
}
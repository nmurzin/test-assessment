<?php

namespace TestAssessment;

use TestAssessment\Contracts\Storage;

class PriceListStorage implements Storage
{
    public function add($item): Storage
    {
        return $this;
    }

    public function getAll(): array
    {
        // TODO: Implement getAll() method.
    }
}
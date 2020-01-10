<?php

namespace TestAssessment\Validators;

use TestAssessment\Contracts\Storage;
use TestAssessment\Exceptions\NotValidInputException;

final class PriceValidator
{
    /**
     * @param $key
     * @return bool
     *
     * @throws NotValidInputException
     */
    static function validateProductKey($key): bool
    {
        if (!is_string($key)) {
            throw new NotValidInputException("The product code should be string.");
        }

        if (strlen($key) !== 2) {
            throw new NotValidInputException("The product code should be 2 characters long.");
        }

        return true;
    }

    /**
     * @param $prices
     * @return bool
     *
     * @throws NotValidInputException
     */
    static function validatePrices($prices): bool
    {
        if (!is_array($prices)) {
            throw new NotValidInputException("The product prices should be array.");
        }

        foreach ($prices as $quantity => $price) {
            if ($quantity <= 0) {
                throw new NotValidInputException("The product quantity should not be null.");
            }

            if (!is_float($price)) {
                throw new NotValidInputException("The product price should be float.");
            }
        }

        return true;
    }
}

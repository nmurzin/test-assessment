<?php
namespace TestAssessment\Validators;

use TestAssessment\Contracts\Storage;
use TestAssessment\Exceptions\NotValidInputException;

final class CartValidator
{
    /**
     * @var Storage
     */
    public static Storage $priceList;

    /**
     * @param $key
     * @return bool
     *
     * @throws NotValidInputException
     */
    public static function validateProductKeyExistsInPriceList($key):bool {
        if(empty(self::$priceList->getProductPrice($key))){
            throw new NotValidInputException("Such product code don't exist in price list.");
        }

        return true;
    }
}

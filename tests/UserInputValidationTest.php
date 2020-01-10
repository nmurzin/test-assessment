<?php

namespace TestAssessment\Tests;

use TestAssessment\Entities\Price as PriceEntity;
use TestAssessment\Exceptions\NotValidInputException;
use TestAssessment\ShopTerminal;
use TestAssessment\Storages\Cart;
use TestAssessment\Storages\PriceList;
use TestAssessment\Contracts\Terminal;
use PHPUnit\Framework\TestCase;

/**
 * Class TestUserInputValidation
 * @package TestAssessment\Tests
 */
class UserInputValidationTest extends TestCase
{
    /**
     * @var Terminal
     */
    private Terminal $terminal;

    /**
     * TotalPriceCalculationTest set up.
     */
    protected function setUp(): void
    {
        $this->terminal = new ShopTerminal(new Cart(), new PriceList());
    }

    /**
     * @param $productKey
     * @param $productPrices
     * @throws NotValidInputException
     *
     * @dataProvider notValidPricesDataProvider
     */
    public function testNotValidPricesAdding($productKey, $productPrices): void
    {
        $this->expectException(NotValidInputException::class);

        new PriceEntity($productKey, $productPrices);
    }

    /**
     * @return array
     */
    public function notValidPricesDataProvider(): array
    {
        return [
            ['TEST', [1 => 2.00, 4 => 7.00]],
            ['BB', [1 => "iam not sure about price?"]],
            ['AA', [2.22, 7.00]],
            ['C', [1 => 1.25, 6 => 6.00]],
            [2.03, [1 => 0.15]]
        ];
    }
}
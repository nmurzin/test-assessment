<?php

namespace TestAssessment\Tests;

use TestAssessment\Entities\Price as PriceEntity;
use TestAssessment\ShopTerminal;
use TestAssessment\Storages\Cart;
use TestAssessment\Storages\PriceList;
use TestAssessment\Contracts\Terminal;
use PHPUnit\Framework\TestCase;

/**
 * Class TotalPriceCalculationTest
 * @package TestAssessment\Tests
 */
class TotalPriceCalculationTest extends TestCase
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
        $prices = [
            'ZA' => [1 => 2.00, 4 => 7.00],
            'YB' => [1 => 12.00],
            'FC' => [1 => 1.25, 6 => 6.00],
            'GD' => [1 => 0.15],
        ];

        $this->terminal = new ShopTerminal(new Cart(), new PriceList());

        foreach ($prices as $productKey => $productPrices) {
            $this->terminal->setPricing(new PriceEntity($productKey, $productPrices));
        }
    }

    /**
     * @param  array  $productList
     * @param  float  $expectedPrice
     *
     * @dataProvider productsDataProvider
     */
    public function testTotalPriceCalculation(array $productList, float $expectedPrice): void
    {
        $this->terminal->clearCart();

        foreach ($productList as $productKey) {
            $this->terminal->scanItem($productKey);
        }

        $this->assertEquals($expectedPrice, $this->terminal->getTotal());
    }

    /**
     * @return array
     */
    public function productsDataProvider(): array
    {
        return [
            [['ZA', 'YB', 'FC', 'GD', 'ZA', 'YB', 'ZA', 'ZA'], 32.40],
            [['FC', 'FC', 'FC', 'FC', 'FC', 'FC', 'FC'], 7.25],
            [['ZA', 'YB', 'FC', 'GD'], 15.40]
        ];
    }
}
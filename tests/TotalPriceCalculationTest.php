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
     * TotalPriceCalculationTest constructor.
     */
    public function __construct()
    {
        $this->terminal = new ShopTerminal(new Cart(), new PriceList());

        $this->terminal->setPricing(new PriceEntity('ZA', [1 => 2.00, 4 => 7.00]));
        $this->terminal->setPricing(new PriceEntity('YB', [1 => 12.00]));
        $this->terminal->setPricing(new PriceEntity('FC', [1 => 1.25, 6 => 6.00]));
        $this->terminal->setPricing(new PriceEntity('GD', [1 => 0.15]));

        parent::__construct();
    }

	public function testFirstDataSet()
	{
		$dataSet = ['ZA', 'YB', 'FC', 'GD', 'ZA', 'YB', 'ZA', 'ZA'];
		$expectedResult = 32.40;
		$this->terminal->clearCart();

		foreach ($dataSet as $item) {
			$this->terminal->scanItem($item);
		}

		$this->assertEquals($expectedResult, $this->terminal->getTotal());
	}

	public function testSecondDataSet()
	{
		$dataSet = ['FC', 'FC', 'FC', 'FC', 'FC', 'FC', 'FC'];
		$expectedResult = 7.25;
		$this->terminal->clearCart();

		foreach ($dataSet as $item) {
			$this->terminal->scanItem($item);
		}

		$this->assertEquals($expectedResult, $this->terminal->getTotal());
	}

	public function testThirdDataSet()
	{
		$dataSet = ['ZA', 'YB', 'FC', 'GD'];
		$expectedResult = 15.40;
		$this->terminal->clearCart();

		foreach ($dataSet as $item) {
			$this->terminal->scanItem($item);
		}

		$this->assertEquals($expectedResult, $this->terminal->getTotal());
	}
}
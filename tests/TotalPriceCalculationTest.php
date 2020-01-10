<?php

namespace TestAssessment\Tests;

use TestAssessment\Price;
use TestAssessment\Terminal;
use TestAssessment\CartStorage;
use TestAssessment\PriceListStorage;
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
        $this->terminal = new Terminal(new CartStorage(), new PriceListStorage());

        $this->terminal->setPricing(new Price('ZA', [1 => 2.00, 4 => 7.00]));
        $this->terminal->setPricing(new Price('YB', [1 => 12.00]));
        $this->terminal->setPricing(new Price('FC', [1 => 1.25, 6 => 6.00]));
        $this->terminal->setPricing(new Price('GD', [1 => 0.15]));

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
//		$thirdDataSetResult = 15.40;
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
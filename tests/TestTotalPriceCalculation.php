<?php

namespace TestAssessment\Tests;

use TestAssessment\Price;
use TestAssessment\Terminal;
use TestAssessment\Tests\Contracts\Test;

/**
 * Class TestTotalPriceCalculation
 * @package TestAssessment\Tests
 */
class TestTotalPriceCalculation implements Test
{
    /**
     * @var Terminal
     */
    private Terminal $terminal;

    /**
     * TestTotalPriceCalculation constructor.
     * @param  Terminal  $terminal
     */
    public function __construct(Terminal $terminal)
    {
        $this->terminal = $terminal;
        $this->terminal->setPricing(new Price('ZA', [1 => 2.00, 4 => 7.00]));
        $this->terminal->setPricing(new Price('YB', [1 => 12.00]));
        $this->terminal->setPricing(new Price('FC', [1 => 1.25, 6 => 6.00]));
        $this->terminal->setPricing(new Price('GD', [1 => 0.15]));
    }

    /**
     * @return mixed|void
     */
    public function testFeature(): void
    {
        $firstDataSetResult = 32.40;
        $secondDataSetResult = 7.25;
        $thirdDataSetResult = 15.40;

        assert($this->setUpFirstDataSet() === $firstDataSetResult, "{$firstDataSetResult}  is not pass");
        assert($this->setUpSecondDataSet() === $secondDataSetResult, "{$secondDataSetResult} is not pass");
        assert($this->setUpThirdDataSet() === $thirdDataSetResult, "{$thirdDataSetResult} is not pass");

        assert($this->setUpFirstDataSet() !== $secondDataSetResult,
            "{$firstDataSetResult} is not equal to {$secondDataSetResult}");

        echo "Price calculation tests passed!\n";
    }

    /**
     * @return float
     */
    private function setUpFirstDataSet(): float
    {
        $dataSet = ['ZA', 'YB', 'FC', 'GD', 'ZA', 'YB', 'ZA', 'ZA'];

        $this->terminal->clearCart();

        foreach ($dataSet as $item) {
            $this->terminal->scanItem($item);
        }

        return $this->terminal->getTotal();
    }

    /**
     * @return float
     */
    private function setUpSecondDataSet(): float
    {
        $dataSet = ['FC', 'FC', 'FC', 'FC', 'FC', 'FC', 'FC'];

        $this->terminal->clearCart();

        foreach ($dataSet as $item) {
            $this->terminal->scanItem($item);
        }

        return $this->terminal->getTotal();
    }

    /**
     * @return float
     */
    private function setUpThirdDataSet(): float
    {
        $dataSet = ['ZA', 'YB', 'FC', 'GD'];

        $this->terminal->clearCart();

        foreach ($dataSet as $item) {
            $this->terminal->scanItem($item);
        }

        return $this->terminal->getTotal();
    }
}
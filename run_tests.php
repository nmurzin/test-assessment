<?php
declare(strict_types=1);
assert_options(ASSERT_BAIL, true);

use TestAssessment\Tests\TestTotalPriceCalculation;
use TestAssessment\Terminal;
use TestAssessment\CartStorage;
use TestAssessment\PriceListStorage;

require 'vendor/autoload.php';


$terminal = new Terminal(new CartStorage(), new PriceListStorage());

$tests = [
    TestTotalPriceCalculation::class,
];


foreach ($tests as $testClass) {
    (new $testClass($terminal))->testFeature();
}
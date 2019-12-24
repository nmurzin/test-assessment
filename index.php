<?php
declare(strict_types=1);

use TestAssessment\CartStorage;
use TestAssessment\PriceListStorage;
use TestAssessment\Terminal;

require 'vendor/autoload.php';

$terminal = new Terminal(new CartStorage(), new PriceListStorage());

$terminal->setPricing([]);
$terminal->scanItem("ZA")->scanItem("ZA")->scanItem("ZA")->scanItem("FC");

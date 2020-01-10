<?php
declare(strict_types=1);

use TestAssessment\Storages\Cart;
use TestAssessment\Storages\PriceList;
use TestAssessment\ShopTerminal;

require 'vendor/autoload.php';

$terminal = new ShopTerminal(new Cart(), new PriceList());
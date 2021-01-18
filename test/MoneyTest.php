<?php
require_once('vendor/autoload.php');

class MoneyTest extends PHPUnit\Framework\TestCase {
    public function testMultiplication() {
        $five = new money\Dollar(5);
        $five->times(2);
        $this->assertEquals(10, $five->amount);
    }
}
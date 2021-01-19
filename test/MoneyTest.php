<?php
require_once('vendor/autoload.php');

class MoneyTest extends PHPUnit\Framework\TestCase {
    public function testMultiplication() {
        $five = money\Money::dollar(5);
        $this->assertEquals(money\Money::dollar(10), $five->times(2));
        $this->assertEquals(money\Money::dollar(15), $five->times(3));
    }

    public function testEquality() {
        $this->assertTrue((money\Money::dollar(5))->equals(money\Money::dollar(5)));
        $this->assertFalse((money\Money::dollar(5))->equals(money\Money::dollar(6)));
        $this->assertFalse((money\Money::franc(5))->equals(money\Money::dollar(5)));
    }

    public function testCurrency() {
        $this->assertEquals("USD", money\Money::dollar(1)->currency());
        $this->assertEquals("CHF", money\Money::franc(1)->currency());
    }
}
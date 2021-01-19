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
        $this->assertTrue((money\Money::franc(5))->equals(money\Money::franc(5)));
        $this->assertFalse((money\Money::franc(5))->equals(money\Money::franc(6)));
        $this->assertFalse((money\Money::franc(5))->equals(money\Money::dollar(5)));
    }

    public function testFrancMultiplication() {
        $five = money\Money::franc(5);
        $this->assertEquals(money\Money::franc(10), $five->times(2));
        $this->assertEquals(money\Money::franc(15), $five->times(3));
    }
}
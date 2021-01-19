<?php
require_once('vendor/autoload.php');

class MoneyTest extends PHPUnit\Framework\TestCase {
    public function testMultiplication() {
        $five = new money\Dollar(5);
        $this->assertEquals(new money\Dollar(10), $five->times(2));
        $this->assertEquals(new money\Dollar(15), $five->times(3));
    }

    public function testEquality() {
        $this->assertTrue((new money\Dollar(5))->equals(new money\Dollar(5)));
        $this->assertFalse((new money\Dollar(5))->equals(new money\Dollar(6)));
    }

    public function testFrancMultiplication() {
        $five = new money\Franc(5);
        $this->assertEquals(new money\Franc(10), $five->times(2));
        $this->assertEquals(new money\Franc(15), $five->times(3));
    }
}
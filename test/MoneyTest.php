<?php
require_once('vendor/autoload.php');

class MoneyTest extends PHPUnit\Framework\TestCase {
    public function testMultiplication() {
        $five = new money\Dollar(5);
        $product = $five->times(2);
        $this->assertEquals(10, $product->amount);

        $product = $five->times(3);
        $this->assertEquals(15, $product->amount);
    }

    public function testEquality() {
        $this->assertTrue((new money\Dollar(5))->equals(new money\Dollar(5)));
        $this->assertFalse((new money\Dollar(5))->equals(new money\Dollar(6)));
    }
}
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

    public function testSimpleAddition() {
        $five = money\Money::dollar(5);
        $sum = $five->plus($five);
        $bank = new money\Bank();
        $reduced = $bank->reduce($sum, "USD");
        $this->assertEquals(money\Money::dollar(10), $reduced);
    }

    public function testPlusReturnsSum() {
        $five = money\Money::dollar(5);
        $sum = $five->plus($five);
        $this->assertEquals($five, $sum->augend);
        $this->assertEquals($five, $sum->addend);
    }

    public function testReduceSum() {
        $sum = new money\Sum(money\Money::dollar(3), money\Money::dollar(4));
        $bank = new money\Bank();
        $result = $bank->reduce($sum, "USD");
        $this->assertEquals(money\Money::dollar(7), $result);
    }

    public function testReduceMoney() {
        $bank = new money\Bank();
        $result = $bank->reduce(money\Money::dollar(1), "USD");
        $this->assertEquals(money\Money::dollar(1), $result);
    }

    public function testReduceMoneyDifferentCurrency() {
        $bank = new money\Bank();
        $bank->addRate("CHF", "USD", 2);
        $result = $bank->reduce(money\Money::franc(2), "USD");
        $this->assertEquals(money\Money::dollar(1), $result);
    }

    public function testIdentityRate() {
        $this->assertEquals(1, (new money\Bank())->rate("USD", "USD"));
    }
}
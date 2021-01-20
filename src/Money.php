<?php
namespace money;

class Money implements Expression {
    public $amount;
    public $currency;

    function __construct($amount, $currency) {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function times($multiplier) : Expression {
        return new Money($this->amount * $multiplier, $this->currency);
    }

    public function plus(Expression $addend) : Expression {
        return new Sum($this, $addend);
    }

    public function reduce(Bank $bank, string $to) : Money {
        $rate = $bank->rate($this->currency, $to);
        return new Money($this->amount / $rate, $to);
    }

    public function currency() {
        return $this->currency;
    }

    public function equals($object) {
        return $this->amount == $object->amount && $this->currency() == $object->currency();
    }
    
    public function toString() {
        return $this->amount . ' ' . $this->currency;
    }

    public static function dollar($amount) {
        return new Money($amount, "USD");
    }

    public static function franc($amount) {
        return new Money($amount, "CHF");
    }
}
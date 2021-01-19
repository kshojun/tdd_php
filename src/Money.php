<?php
namespace money;

abstract class Money {
    protected $amount;
    protected $currency;

    function __construct($amount, $currency) {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    abstract function times($multiplier);

    function currency() {
        return $this->currency;
    }

    function equals($object) {
        return $this->amount == $object->amount && get_class($object) == get_class($this);
    }

    public static function dollar($amount) {
        return new Dollar($amount, "USD");
    }

    public static function franc($amount) {
        return new Franc($amount, "CHF");
    }
}
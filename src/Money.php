<?php
namespace money;

class Money {
    protected $amount;

    function __construct($amount) {
        $this->amount = $amount;
    }

    function equals($object) {
        return $this->amount == $object->amount && get_class($object) == get_class($this);
    }

    public static function dollar($amount) {
        return new Dollar($amount);
    }

    public static function franc($amount) {
        return new Franc($amount);
    }
}
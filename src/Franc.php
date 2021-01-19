<?php
namespace money;

class Franc {
    private $amount;

    function __construct($amount) {
        $this->amount = $amount;
    }

    function times($multiplier) {
        return new Franc($this->amount * $multiplier);
    }

    function equals($object) {
        return $this->amount == $object->amount;
    }
}
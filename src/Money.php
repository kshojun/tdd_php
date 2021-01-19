<?php
namespace money;

class Money {
    protected $amount;

    function __construct($amount) {
        $this->amount = $amount;
    }

    function equals($object) {
        return $this->amount == $object->amount;
    }
}
<?php
namespace money;

class Franc extends Money {
    function __construct($amount, $currency) {
        parent::__construct($amount, $currency);
    }

    function times($multiplier) {
        return Money::franc($this->amount * $multiplier);
    }
}
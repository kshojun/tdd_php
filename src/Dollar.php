<?php
namespace money;

class Dollar {
    public $amount;

    function __construct($amount) {
        $this->amount = $amount;
    }

    function times($multiplier) {
        return new Dollar($this->amount * $multiplier);
    }
}
<?php
namespace money;

class Franc extends Money {
    function times($multiplier) {
        return new Franc($this->amount * $multiplier);
    }
}
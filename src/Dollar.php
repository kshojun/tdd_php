<?php
namespace money;

class Dollar extends Money {
    function times($multiplier) {
        return new Dollar($this->amount * $multiplier);
    }
}
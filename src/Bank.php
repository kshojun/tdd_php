<?php
namespace money;

class Bank {
    private array $rates = [];

    function reduce(object $source, string $to) : Money {
        return $source->reduce($this, $to);
    }

    function addRate(string $from, string $to, int $rate) {
        $this->rates[$from . '_' . $to] = $rate;
    }

    function rate(string $from, string $to) : int {
        if ($from == $to) {
            return 1;
        }
        return $this->rates[$from . '_' . $to] ?: 0;
    }
}
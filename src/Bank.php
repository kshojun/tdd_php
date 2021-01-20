<?php
namespace money;

class Bank {
    function reduce(object $source, string $to) : Money {
        return $source->reduce($to);
    }
}
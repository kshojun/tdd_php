<?php
namespace money;

interface Expression {
    function reduce(Bank $bank, string $to): Money;
}
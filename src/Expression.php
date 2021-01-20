<?php
namespace money;

interface Expression {
    function reduce(string $to): Money;
}
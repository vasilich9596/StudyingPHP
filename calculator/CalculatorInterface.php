<?php

namespace Calculator;

interface CalculatorInterface
{
    public function run(string $command, ?float $left, ?float $right): float;
}

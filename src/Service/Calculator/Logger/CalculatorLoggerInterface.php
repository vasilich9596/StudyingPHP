<?php

namespace App\Service\Calculator\Logger;

interface CalculatorLoggerInterface
{
    public function log(string $command, ?float $left, ?float $right, float $result): void;
}
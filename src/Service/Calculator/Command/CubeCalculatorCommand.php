<?php

namespace App\Service\Calculator\Command;

class CubeCalculatorCommand implements CalculatorCommandInterface
{
    /**
     * @param float $leftSide
     * @param float $rightSide
     * @return float
     */
    public function calculate(?float $leftSide, ?float $rightSide): float
    {
        return $leftSide * $leftSide * $leftSide;
    }
}
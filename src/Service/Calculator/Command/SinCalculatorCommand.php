<?php

namespace App\Service\Calculator\Command;

class SinCalculatorCommand implements CalculatorCommandInterface
{
    /**
     * @param float $leftSide
     * @param float $rightSide
     * @return float
     */
    public function calculate(?float $leftSide, ?float $rightSide): float
    {
        $radian = deg2rad($leftSide);
        return sin($radian);
    }
}

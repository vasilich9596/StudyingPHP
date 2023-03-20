<?php

namespace Calculator\Command;

class SqrtCalculatorCommand implements CalculatorCommandInterface
{
    /**
     * @param float $leftSide
     * @param float $rightSide
     * @return float
     */
    public function calculate(?float $leftSide, ?float $rightSide): float
    {
    return sqrt($leftSide);
    }
}
<?php

namespace Calculator\Command;

class PowCalculatorCommand implements CalculatorCommandInterface
{
    /**
     * @param float $leftSide
     * @param float $rightSide
     * @return float
     */
    public function calculate(?float $leftSide, ?float $rightSide): float
    {
        return pow($leftSide,$rightSide);
    }
}

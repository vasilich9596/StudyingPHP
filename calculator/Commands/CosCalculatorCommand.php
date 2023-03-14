<?php

namespace Calculator\Command;

class CosCalculatorCommand implements CalculatorCommandInterface
{
    /**
     * @param float $leftSide
     * @param float $rightSide
     * @return float
     */
    public function calculate(?float $leftSide, ?float $rightSide): float
    {
        $radian = deg2rad($leftSide);
        return cos($radian);
    }
}

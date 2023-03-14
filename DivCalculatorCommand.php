<?php

class DivCalculatorCommand implements CalculatorCommandInterface, \Calculator\Command\CalculatorCommandInterface
{
    /**
     * @param float $leftSide
     * @param float $rightSide
     * @return float
     */
    public function calculate(float $leftSide, float $rightSide): float
    {
        return $leftSide / $rightSide;
    }
}
<?php

class AbsCalculatorCommand implements CalculatorCommandInterface
{
    public function calculate(?float $leftSide, ?float $rightSide): float
    {
        return abs($leftSide);
    }
}
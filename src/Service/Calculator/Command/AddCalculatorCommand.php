<?php

namespace App\Service\Calculator\Command;

class AddCalculatorCommand implements CalculatorCommandInterface
{
    /**
     * @param float $leftSide
     * @param float $rightSide
     * @return float
     *
     * @inheritDoc
     */
    public function calculate(?float $leftSide, ?float $rightSide): float
    {
        return $leftSide + $rightSide;
    }
}
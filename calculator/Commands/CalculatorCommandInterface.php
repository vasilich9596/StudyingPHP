<?php

namespace Calculator\Command;

interface CalculatorCommandInterface
{
    /**
     * @param float| null $leftSide
     * @param float|null $rightSide
     * @return float
     */
    public function calculate(?float $leftSide,?float $rightSide): float;
}
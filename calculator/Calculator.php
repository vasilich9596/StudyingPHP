<?php

namespace Calculator;

class Calculator
{
    private CalculatorCommandRegistry $registry;

    public function __construct(CalculatorCommandRegistry $registry)
    {
        $this->registry = $registry;
    }

    /**]
     * @param string $command
     * @param float|null $leftSide
     * @param float|null $rightSide
     * @return float
     * @throws \Exception
     */
    public function run(string $command, ?float $leftSide, ?float $rightSide): float
    {
        $calculatorCommand = $this->registry->getCommand($command);
        $commandValidator = $this->registry->getValidator($command);
        $commandValidator->validate($leftSide, $rightSide);
        $result = $calculatorCommand->calculate($leftSide, $rightSide);

        return $result;
    }

}
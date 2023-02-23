<?php

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
     * @throws Exception
     */
    public function run(string $command, ?float $leftSide,?float $rightSide): float
    {
        $calculatorCommand = $this->registry->get($command);

        $result = $calculatorCommand->calculate($leftSide,$rightSide);

        return $result;
    }

}
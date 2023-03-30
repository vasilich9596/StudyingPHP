<?php

namespace App\Service\Calculator;

use \App\Service\Calculator\Logger\CalculatorLoggerInterface;

class LoggingCalculatorDecorator implements CalculatorInterface
{
    /**
     * @var Calculator
     */
    private CalculatorInterface $originCalculator;

    /**
     * @var CalculatorLoggerInterface
     */
    private CalculatorLoggerInterface $logger;

    /**
     * @param CalculatorInterface $calculator
     */
    public function __construct(CalculatorInterface $calculator, CalculatorLoggerInterface $logger)
    {
        $this->originCalculator = $calculator;
        $this->logger = $logger;
    }

    public function run(string $command, ?float $left, ?float $right): float
    {

        $result = $this->originCalculator->run($command, $left, $right);

        $this->logger->log($command,$left, $right,$result);


        return $result;

    }
}

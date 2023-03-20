<?php

namespace Calculator;
include_once __DIR__ . '/HistoryLoggingJson.php';
include_once __DIR__ . '/HistoryLoggingTxt.php';

class LoggingCalculatorDecorator implements CalculatorInterface
{
    /**
     * @var Calculator
     */
    private CalculatorInterface $originCalculator;

    /**
     * @param CalculatorInterface $calculator
     */
    public function __construct(CalculatorInterface $calculator)
    {
        $this->originCalculator = $calculator;
    }

    public function run(string $command, ?float $left, ?float $right): float
    {

        $result = $this->originCalculator->run($command, $left, $right);

        $pdo = new \PDO('mysql:host=calculator_data;dbname=calculator_histories_database','vasilich','12345');

        $JsonLog = new HistoryLoggingJson();
        $JsonLog->jsonWrite($command, $left, $right, $result);
        $txtLog = new HistoryLoggingTxt();
        $txtLog->TxtWriter($command, $left, $right, $result);
        $DBlog = new DBLogging($pdo);
        $DBlog ->DBlog($command,$left,$right,$result);

        return $result;

    }
}

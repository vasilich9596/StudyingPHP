<?php

namespace Calculator;

use Calculator\Logger\CalculatorLoggerInterface;

class HistoryDbLogger implements CalculatorLoggerInterface
{
    /**
     * @var \PDO
     */
    private \PDO $pdo;

    /**
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param string $command
     * @param float|null $left
     * @param float|null $right
     * @param float $result
     * @return void
     */
    public function log(string $command, ?float $left, ?float $right, float $result):void
    {
    $sql = 'INSERT INTO calculator_history (command,left_operand,right_operand,result) values (?,?,?,?);';

    $stmt = $this->pdo->prepare($sql);

    $stmt->execute([$command,$left,$right,$result]);
    }
}
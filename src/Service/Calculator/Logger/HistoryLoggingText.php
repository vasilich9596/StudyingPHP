<?php

namespace App\Service\Calculator\Logger;

use Calculator\Logger\CalculatorLoggerInterface;
use SplFileObject;

class HistoryLoggingText implements CalculatorLoggerInterface
{
    public function log(string $command,?float $left,?float $right,?float $result):void
    {

        \file_put_contents('history.txt', " command  . $command: left Operand  $left : right operand  $right : result = $result:" . PHP_EOL, FILE_APPEND);


    }
}
<?php

namespace Calculator;

use SplFileObject;

class HistoryLoggingTxt
{
    public function TxtWriter($command, $left, $right, $result)
    {

        file_put_contents('history.txt', " command  . $command: left Operand  $left : right operand  $right : result = $result:" . PHP_EOL, FILE_APPEND);


    }
}
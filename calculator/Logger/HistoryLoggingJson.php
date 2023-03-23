<?php

namespace Calculator\Logger;

use Calculator\Logger\CalculatorLoggerInterface;

class HistoryLoggingJson implements CalculatorLoggerInterface
{
    public function log(string $command, ?float $left, ?float $right, ?float $result):void
    {
        $historyFile = __DIR__ . '/history.json';
        $history = [];

        if (file_exists($historyFile)) {
            $historyConent = \file_get_contents($historyFile);
            $history = \json_decode($historyConent, true);
        }
        $history[] = [
            'command' => $command,
            'argument' => [
                'left' => $left,
                'right' => $right
            ],
            'result' => $result
        ];
        $historyConent = \json_encode($history);
        file_put_contents($historyFile, $historyConent);
    }
}
<?php

namespace Calculator;

class HistoryLoggingJson
{
    public function jsonWrite($command, $left, $right, $result){
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
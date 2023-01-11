<?php

define('CALCULATOR_HISTORY_FILE_PATH',__DIR__.'/history.json');
function calculator_history_add($command,$argument,$result)
{
    $historyElement = [
        'command'  => $command,
        'argument' => $argument,
        'result'   => $result
    ];

    if(file_exists(CALCULATOR_HISTORY_FILE_PATH)) {
        $historyContent = file_get_contents(CALCULATOR_HISTORY_FILE_PATH);
        $histoies = json_decode($historyContent,true);
    }else{
        $histoies =[];
    }

    $histoies[] = $historyElement;

    file_put_contents(CALCULATOR_HISTORY_FILE_PATH,json_encode($histoies));
}
<?php

include_once __DIR__ . '/calculator.php';

//function for validate arduments
function validation_to_run_calculator()
{
    $commandInfo = calculator_get_arguments_from_command();
    $commandFunction = calculator_get_command_function($commandInfo['commandName']);

//validation for history

    if ($commandInfo['commandName'] == 'history') {
        if (file_exists(CALCULATOR_HISTORY_FILE_PATH)) {
            $historyFile = file_get_contents(CALCULATOR_HISTORY_FILE_PATH);
            $historyFile = json_decode($historyFile, true);

            if ($commandInfo['arguments'][0] > count($historyFile)) {
                throw  new Exception('history not have ' . $commandInfo['arguments'][0] . ' strings only ' . count($historyFile));
            }
        }else{
            throw  new Exception('U need take some operation wwith calculator for check history');
        }
    }

//validate for name command
    if (!$commandInfo['commandName']) {
        throw new Exception('NO pass command as first argument');

    }

//validate the command function to be on registry
    if (!$commandFunction) {
        throw new Exception('unknown command ' . $commandInfo['commandName']);
    }

//validate the number of required argument
    if ($commandFunction['needCommand'] != count($commandInfo['arguments'])) {
        throw new Exception('for this function u need ' . $commandFunction['needCommand'] . ' command');
    }

//validate for need 2 numeric command
    if ($commandFunction['needCommand'] == 2) {
        if (!is_numeric($commandInfo['arguments'][0])) {
            throw new Exception('u need a numeric command 1');
        }
        if (!is_numeric($commandInfo['arguments'][1])) {
            throw new Exception('u need a numeric command 2');
        }
    }

//validate for need 1 numeric command
    if ($commandFunction['needCommand'] == 1) {
        if (!is_numeric($commandInfo['arguments'][0])) {
            throw new Exception('u need a numeric command 1');
        }
    }

//if all right take result
    return call_user_func_array($commandFunction['nameFunc'], $commandInfo['arguments']);
}
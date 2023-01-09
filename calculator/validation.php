<?php

include_once __DIR__.'/calculator.php';

//function for validate arduments
function validation_to_run_func()
{
    $commandInfo = calculator_get_arguments_from_command();
    $commandFunction = calculator_get_command_function($commandInfo['commandName']);

//validate for name command
    if(!$commandInfo['commandName']){
        throw new Exception('NO pass command as first argument');
//        trigger_error('NO pass command as first argument'.E_USER_ERROR);

    }
//validate the command function to be on registry
    if(!$commandFunction){
        throw new Exception('unknown command '.$commandInfo['commandName']);
    }

//validate the number of required argument
    if ($commandFunction['needCommand'] != count($commandInfo['arguments'])) {
        throw new Exception('for this function u need ' . $commandFunction['needCommand'] . ' command');
    }

//validate for need 2 numeric command
    if ($commandFunction['needCommand'] == 2){
        if (!is_numeric($commandInfo['arguments'][0])){
            throw new Exception('u need a numeric command 1');
        }
        if (!is_numeric($commandInfo['arguments'][1])){
            throw new Exception('u need a numeric command 2');
        }
    }

//validate for need 1 numeric command
    if ($commandFunction['needCommand'] == 1){
        if (!is_numeric($commandInfo['arguments'][0])){
           throw new Exception('u need a numeric command 1');
        }
    }

    //if all right take result
        $result = call_user_func_array($commandFunction['nameFunc'],$commandInfo['arguments']);

    if ($commandInfo['commandName'] != 'history') {
        file_put_contents('history.txt', $commandInfo['commandName'] . ' result ' . $result . PHP_EOL, FILE_APPEND);

        print $commandInfo['commandName'] . ' result ' . $result . PHP_EOL;
    }


}
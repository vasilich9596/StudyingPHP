<?php

include_once __DIR__.'/operators.php';
include_once __DIR__.'/validation.php';

//in validator.php its ($commandInfo)
function calculator_get_arguments_from_command(): array
{
    $argument = $_SERVER['argv'];
    array_shift($argument);
    $commandName = array_shift($argument);

    return [
        'commandName'=> $commandName,
        'arguments' => $argument
    ];
}

//in validator.php its ($commandFunction)
function calculator_get_command_function($command)
{
    $commandRegistry = [
        'add' => [
            'nameFunc' => 'calculator_add',
            'needCommand' => 2],
        'div' => [
            'nameFunc' => 'calculator_div',
            'needCommand' => 2 ],
        'mul' => [
            'nameFunc' => 'calculator_mul',
            'needCommand' => 2],
        'sub' => [
            'nameFunc' => 'calculator_sub',
            'needCommand' => 2],
        'pow' => [
            'nameFunc' => 'calculator_pov',
            'needCommand' => 1],
        'cos' => [
            'nameFunc' => 'calculator_cos',
            'needCommand' => 1],
        'sin' => [
            'nameFunc' => 'calculator_sin',
            'needCommand' => 1],
        'sqrt' => [
            'nameFunc' => 'calculator_sqrt',
            'needCommand' => 1],
        'square' => [
            'nameFunc' => 'calculator_square',
            'needCommand' => 1],
        'cube' => [
            'nameFunc' => 'calculator_cube',
            'needCommand' => 1],
        'pi' => [
            'nameFunc' => 'calculator_pi',
            'needCommand' => 0],
        'abs' => [
            'nameFunc' => 'calculator_abs',
            'needCommand' => 1],
        'log' => [
            'nameFunc' => 'calculator_log',
        'needCommand' => 1],
        'logTen' => [
            'nameFunc' => 'calculator_logTen',
            'needCommand' => 1]
    ];

//if we have a command we can work
    if(array_key_exists($command,$commandRegistry)){
        return $commandRegistry[$command];
    }

    return false;
}

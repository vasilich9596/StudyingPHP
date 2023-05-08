<?php


function calculator_autoload(string $class): void
{
    $classParts = \explode('\\', $class);

    if ($classParts[0] !== 'Calculator') {
        return;
    }

    \array_shift($classParts);

    $filePath = __DIR__;

    $classParts[\count($classParts) - 1] = '.php';

    $filePath .= '/' . \implode('/', $classParts);

    if (\file_exists($filePath)) {
        include_once $filePath;
    }
}

spl_autoload_register('calculator_autoload');
<?php

function app_autoload(string $className): void
{
    $parts =  \explode('\\', $className);

    if ('App' !== $parts[0]){
        return;
    }

    \array_shift($parts);

    $sourceDirectory = __DIR__.'/../src/';
    $classFile = $sourceDirectory.\implode('/', $parts).'.php';


    if (\file_exists($classFile)){
        include_once $classFile;
    }
}

spl_autoload_register('app_autoload');
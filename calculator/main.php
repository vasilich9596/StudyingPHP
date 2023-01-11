<?php
include_once __DIR__.'/calculator.php';

//function what start validation (check) in validation.php

try {
   calculator_run();
}catch (Exception $array){
    print ' - u need help with calculator?'.PHP_EOL;
    print ' - ok u have second chance'.PHP_EOL.'bat not do this next time'.PHP_EOL;
    print $array;
}


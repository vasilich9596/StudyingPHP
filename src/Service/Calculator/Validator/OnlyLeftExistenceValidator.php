<?php

namespace App\Service\Calculator\Validator;

use mysql_xdevapi\Exception;

class OnlyLeftExistenceValidator implements CalculatorArgumentsValidatorInterface
{
    public function validate(?float $left, ?float $right): void
    {
        if(!isset($left)){
            throw new \Exception('u need take left operator');
        }
        if (isset($right)){
            throw new Exception('u need onl left operator');
        }
    }
}
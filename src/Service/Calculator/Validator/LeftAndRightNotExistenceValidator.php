<?php

namespace App\Service\Calculator\Validator;

class LeftAndRightNotExistenceValidator implements CalculatorArgumentsValidatorInterface
{
    public function validate(?float $left, ?float $right): void
    {
        if (isset($left)){
            throw new \Exception('for this validation not need left operand');
        }

        if (isset($right) ){
            throw new \Exception('for this validation not need right operand');
        }
    }
}
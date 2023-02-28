<?php

namespace Calculator\Validator;

class LeftAndRightExistenceValidator implements CalculatorArgumentsValidatorInterface
{
    public function validate(?float $left, ?float $right): void
    {
        if (null === $left){
            throw new \Exception('missed left side');
        }
        if (null === $right){
            throw new \Exception('missed right side');
        }
    }
}

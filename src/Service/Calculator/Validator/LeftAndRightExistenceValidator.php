<?php

namespace App\Service\Calculator\Validator;

class LeftAndRightExistenceValidator implements CalculatorArgumentsValidatorInterface
{
    /**
     * @throws \Exception
     */
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

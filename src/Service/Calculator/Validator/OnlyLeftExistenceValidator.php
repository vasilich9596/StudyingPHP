<?php

namespace App\Service\Calculator\Validator;


class OnlyLeftExistenceValidator implements CalculatorArgumentsValidatorInterface
{
    /**
     * @throws \Exception
     */
    public function validate(?float $left, ?float $right): void
    {
        if(!isset($left)){
            throw new \Exception('u need take left operator');
        }
        if (isset($right)){
            throw new \Exception('u need only left operator');
        }
    }
}
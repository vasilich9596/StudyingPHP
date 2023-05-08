<?php

namespace App\Service\Calculator\Validator;

class NoopValidator implements CalculatorArgumentsValidatorInterface
{
    public function validate(?float $left, ?float $right): void
    {

    }
}
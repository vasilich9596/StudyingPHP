<?php

namespace App\Service\Calculator\Validator;
interface CalculatorArgumentsValidatorInterface
{
    /**
     * @param float|null $left
     * @param float|null $right
     * @return mixed
     *
     */
    public function validate(?float $left, ?float $right): void;

}
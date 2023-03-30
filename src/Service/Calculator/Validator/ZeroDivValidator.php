<?php

namespace App\Service\Calculator\Validator;

use mysql_xdevapi\Exception;

class ZeroDivValidator implements CalculatorArgumentsValidatorInterface
{
    public function validate(?float $left, ?float $right): void
    {
      if ($left == 0){
         throw new \Exception(print 'left operand nat can be a zero');
      }
      if($right == 0 ){
          throw new Exception(print 'right operand not can be a zero');
      }
    }

}

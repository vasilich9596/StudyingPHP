<?php

namespace App\Controller;

use App\Service\Calculator\CalculatorCommandRegistry;
use App\Service\Calculator\CalculatorInterface;
use App\Service\Calculator\Command\AbsCalculatorCommand;
use App\Service\Calculator\Command\AddCalculatorCommand;
use App\Service\Calculator\Command\CosCalculatorCommand;
use App\Service\Calculator\Command\CubeCalculatorCommand;
use App\Service\Calculator\Command\DivCalculatorCommand;
use App\Service\Calculator\Command\MulCalculatorCommand;
use App\Service\Calculator\Command\PiCalculatorCommand;
use App\Service\Calculator\Command\PowCalculatorCommand;
use App\Service\Calculator\Command\SinCalculatorCommand;
use App\Service\Calculator\Command\SqrtCalculatorCommand;
use App\Service\Calculator\Command\SubCalculatorCommand;
use App\Service\Calculator\Validator\LeftAndRightExistenceValidator;
use App\Service\Calculator\Validator\NoopValidator;


class CalculatorController
{
    private CalculatorInterface $calculator;

    public function __construct(CalculatorInterface $calculator)
    {
        $this->calculator = $calculator;
    }

    public function handleAction()
    {
        $command = null;
        $leftOperand = null;
        $rightOperand =null;
        $result = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $command = $_POST['command'];
            $leftOperand = (float)$_POST['left'];
            $rightOperand = (float)$_POST['right'];

            $result = $this->calculator->run($command,$leftOperand,$rightOperand);
        }

        include __DIR__.'/../Resources/views/Calculator.php';
    }
}
<?php

namespace App\Controller;

use App\Service\Calculator\CalculatorInterface;

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
        $rightOperand = null;
        $result = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $command = $_POST['command'];
            $leftOperand = (float)$_POST['left'];
            $rightOperand = (float)$_POST['right'];

            $result = $this->calculator->run($command, $leftOperand, $rightOperand);
        }

        include __DIR__ . '/../Resources/views/Calculator.php';
    }
}
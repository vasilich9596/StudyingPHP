<?php

use Calculator\Calculator;
use Calculator\CalculatorCommandRegistry;
use Calculator\Command\AbsCalculatorCommand;
use Calculator\Command\DivCalculatorCommand;
use Calculator\Command\AddCalculatorCommand;
use Calculator\Command\CosCalculatorCommand;
use Calculator\Command\CubeCalculatorCommand;
use Calculator\Command\MulCalculatorCommand;
use Calculator\Command\PiCalculatorCommand;
use Calculator\Command\PowCalculatorCommand;
use Calculator\Command\SinCalculatorCommand;
use Calculator\Command\SqrtCalculatorCommand;
use Calculator\Command\SquareCalculatorCommand;
use Calculator\Command\SubCalculatorCommand;
use Calculator\Validator\LeftAndRightExistenceValidator;
use Calculator\Validator\OnlyLeftExistenceValidator;

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

include_once __DIR__ . '/Commands/CalculatorCommandInterface.php';
include_once __DIR__ . '/Validator/CalculatorArgumentsValidatorInterface.php';
include_once __DIR__ . '/Commands/AddCalculatorCommand.php';
include_once __DIR__ . '/Commands/SubCalculatorCommand.php';
include_once __DIR__ . '/Commands/MulCalculatorCommand.php';
include_once __DIR__ . '/Commands/AbsCalculatorCommand.php';
include_once __DIR__ . '/Commands/CosCalculatorCommand.php';
include_once __DIR__ . '/Commands/DivCalculatorCommand.php';
include_once __DIR__ . '/Commands/CubeCalculatorCommand.php';
include_once __DIR__ . '/Commands/PiCalculatorCommand.php';
include_once __DIR__ . '/Commands/PowCalculatorCommand.php';
include_once __DIR__ . '/Commands/SinCalculatorCommand.php';
include_once __DIR__ . '/Commands/SqrtCalculatorCommand.php';
include_once __DIR__ . '/Commands/SquareCalculatorCommand.php';
include_once __DIR__ . '/Validator/LeftAndRightExistenceValidator.php';
include_once __DIR__ . '/Validator/LeftAndRightNotExistenceValidator.php';
include_once __DIR__ . '/Validator/OnlyLeftExistenceValidator.php';
include_once __DIR__ . '/CalculatorCommandRegistry.php';
include_once __DIR__ . '/CalculatorInterface.php';
include_once __DIR__ . '/Calculator.php';
include_once __DIR__ . '/Commands/AddCalculatorCommand.php';
include_once __DIR__ . '/LoggingCalculatorDecorator.php';

$registry = new CalculatorCommandRegistry();
$registry->add('add', new AddCalculatorCommand(), new LeftAndRightExistenceValidator());
$registry->add('sub', new SubCalculatorCommand(), new LeftAndRightExistenceValidator());
$registry->add('mul', new MulCalculatorCommand(), new LeftAndRightExistenceValidator());
$registry->add('div', new  DivCalculatorCommand(), new LeftAndRightExistenceValidator());
$registry->add('abs', new AbsCalculatorCommand(), new  OnlyLeftExistenceValidator());
$registry->add('cos', new CosCalculatorCommand(), new OnlyLeftExistenceValidator());
$registry->add('cube', new CubeCalculatorCommand(), new OnlyLeftExistenceValidator());
$registry->add('pi', new PiCalculatorCommand(), new  \Calculator\Validator\LeftAndRightNotExistenceValidator());
$registry->add('pow', new PowCalculatorCommand(), new LeftAndRightExistenceValidator());
$registry->add('sin', new SinCalculatorCommand(), new OnlyLeftExistenceValidator());
$registry->add('sqrt', new SqrtCalculatorCommand(), new OnlyLeftExistenceValidator());
$registry->add('square', new SquareCalculatorCommand(), new OnlyLeftExistenceValidator());

$calculator = new Calculator($registry);
$calculator = new \Calculator\LoggingCalculatorDecorator($calculator);
$arguments = $_SERVER['argv'];

array_shift($arguments);

if (!count($argv)) {
    throw new Exception('Missed argument');
}

$commandName = $arguments[0];
$leftOperand = array_key_exists(1, $arguments) ? $arguments[1] : null;
$rightOperand = $arguments[2] ?? null;

if ($leftOperand && !is_numeric($leftOperand)) {
    throw new Exception(sprintf('u need take left operand numeric u take "%s"' . $leftOperand));
}
if ($rightOperand && !is_numeric($rightOperand)) {
    throw new Exception(sprintf('u need take left operand numeric u take "%s"' . $rightOperand));
}

$result = $calculator->run($commandName, $leftOperand, $rightOperand);

print sprintf('command:"%s"; (left side: %f right side: %f). result %f',
        $commandName,
        $leftOperand,
        $rightOperand,
        $result
    ) . PHP_EOL;
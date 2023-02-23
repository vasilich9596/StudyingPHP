<?php

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);


include_once __DIR__ . '/CalculatorCommandInterface.php';
include_once __DIR__ . '/AddCalculatorCommand.php';
include_once __DIR__ . '/SubCalculatorCommand.php';
include_once __DIR__ . '/MulCalculatorCommand.php';
include_once __DIR__ . '/AbsCalculatorCommand.php';
include_once __DIR__ . '/CosCalculatorCommand.php';
include_once __DIR__ . '/CubeCalculatorCommand.php';
include_once __DIR__ . '/PiCalculatorCommand.php';
include_once __DIR__ . '/PowCalculatorCommand.php';
include_once __DIR__ . '/SinCalculatorCommand.php';
include_once __DIR__ . '/SqrtCalculatorCommand.php';
include_once __DIR__ . '/SquareCalculatorCommand.php';
include_once __DIR__ . '/CalculatorCommandRegistry.php';
include_once __DIR__ . '/Calculator.php';


include_once __DIR__ . '/AddCalculatorCommand.php';

$registry = new CalculatorCommandRegistry();
$registry->add('add', new AddCalculatorCommand());
$registry->add('sub', new SubCalculatorCommand());
$registry->add('mul', new MulCalculatorCommand());
$registry->add('abs', new AbsCalculatorCommand());
$registry->add('cos', new CosCalculatorCommand());
$registry->add('cube', new CubeCalculatorCommand());
$registry->add('pi', new PiCalculatorCommand());
$registry->add('pow', new PowCalculatorCommand());
$registry->add('sin', new SinCalculatorCommand());
$registry->add('sqrt', new SqrtCalculatorCommand());
$registry->add('square', new SquareCalculatorCommand());


$calculator = new Calculator($registry);

$arguments = $_SERVER['argv'];

array_shift($arguments);

if (!count($argv)) {
    throw new Exception('Missed argument');
}

$commandName = $arguments[0];
$leftOperand = array_key_exists(1, $arguments) ? $arguments[1] : null;
$rightOperand = isset($arguments[2]) ? $arguments[2] : null;

if ($leftOperand && !is_numeric($leftOperand)){
    throw new Exception(sprintf('u need take left operand numeric u take "%s"'.$leftOperand));
}
if ($rightOperand && !is_numeric($rightOperand)){
    throw new Exception(sprintf('u need take left operand numeric u take "%s"'.$rightOperand));
}

$result = $calculator->run($commandName,$leftOperand,$rightOperand);

print sprintf('command:"%s"; (left side: %f right side: %f). result %f',
$commandName,
$leftOperand,
$rightOperand,
$result
).PHP_EOL;
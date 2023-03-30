<?php

use App\Service\Calculator\Calculator;
use App\Service\Calculator\CalculatorCommandRegistry;
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
use App\Service\Calculator\Validator\LeftAndRightNotExistenceValidator;
use App\Service\Calculator\Validator\NoopValidator;
use App\Service\Calculator\Validator\OnlyLeftExistenceValidator;

$result = null;
$leftOperand = null;
$rightOperand = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $command = $_POST['command'];
    $leftOperand = (float)$_POST['left'];
    $rightOperand = (float)$_POST['right'];

    $registry = new CalculatorCommandRegistry();

    $registry->add('add', new AddCalculatorCommand(), new LeftAndRightExistenceValidator());
    $registry->add('sub', new SubCalculatorCommand(), new LeftAndRightExistenceValidator());
    $registry->add('mul', new MulCalculatorCommand(), new LeftAndRightExistenceValidator());
    $registry->add('div', new  DivCalculatorCommand(), new LeftAndRightExistenceValidator());
    $registry->add('abs', new AbsCalculatorCommand(), new  OnlyLeftExistenceValidator());
    $registry->add('cos', new CosCalculatorCommand(), new OnlyLeftExistenceValidator());
    $registry->add('cube', new CubeCalculatorCommand(), new OnlyLeftExistenceValidator());
    $registry->add('pi', new PiCalculatorCommand(), new  NoopValidator());
    $registry->add('pow', new PowCalculatorCommand(), new LeftAndRightExistenceValidator());
    $registry->add('sin', new SinCalculatorCommand(), new OnlyLeftExistenceValidator());
    $registry->add('sqrt', new SqrtCalculatorCommand(), new OnlyLeftExistenceValidator());


    $calculator = new Calculator($registry);

    $result = $calculator->run($command, $leftOperand, $rightOperand);
}
?>

<html lang="UA">
<head>
    <title>Calculator</title>
</head>
<body>
<nav>
    <a href="/">Home</a>
    <a href="/calculator">Calculator</a>
</nav>
<h1>calculator</h1>
<form method="post" action="/calculator">
    <div>
        <label>Command</label>
        <select name="command">
            <option value="add">Add</option>
            <option value="sub">Sub</option>
            <option value="pi">PI</option>
            <option value="div">Div</option>
            <option value="mul">Mul</option>
            <option value="abs">Abs</option>
            <option value="cube">Cue</option>
            <option value="cos">Cos</option>
            <option value="sin">Sin</option>
            <option value="sqrt">sqrt</option>
        </select>
    </div>

    <div>
        <label>Left</label>
        <input type="text" name="left" value="<?php print $leftOperand; ?>"/>
    </div>

    <div>
        <label>Right</label>
        <input type="text" name="right" value="<?php print $rightOperand; ?>"/>
    </div>
    <div>
        <input type="submit" value="Calculate"/>
    </div>
    <?php if ($result !== null): ?>
        <div>
            Execution result: <?php print $result; ?>
        </div>
    <?php endif; ?>
</form>
</body>
</html>
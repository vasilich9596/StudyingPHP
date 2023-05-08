<?php

use App\Controller\CalculatorController;
use App\Controller\FaqController;
use App\Controller\HomeController;
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
use App\Service\Calculator\Validator\NoopValidator;
use App\Service\Calculator\Validator\OnlyLeftExistenceValidator;

include_once __DIR__ . '/../config/bootstrap.php';

$path = $_SERVER['REQUEST_URI'];

if ($path === '/') {
    $controller = new HomeController();
    $controller->HandleAction();

    exit();
}

if (strpos($path,  '/calculator')=== 0) {
    $registry = new CalculatorCommandRegistry();

    $registry->add('add', new AddCalculatorCommand(), new LeftAndRightExistenceValidator());
    $registry->add('sub', new SubCalculatorCommand(), new LeftAndRightExistenceValidator());
    $registry->add('mul', new MulCalculatorCommand(), new LeftAndRightExistenceValidator());
    $registry->add('div', new  DivCalculatorCommand(), new LeftAndRightExistenceValidator());
    $registry->add('abs', new AbsCalculatorCommand(), new  NoopValidator());
    $registry->add('cos', new CosCalculatorCommand(), new NoopValidator());
    $registry->add('cube', new CubeCalculatorCommand(), new NoopValidator());
    $registry->add('pi', new PiCalculatorCommand(), new  NoopValidator());
    $registry->add('pow', new PowCalculatorCommand(), new NoopValidator());
    $registry->add('sin', new SinCalculatorCommand(), new NoopValidator());
    $registry->add('sqrt', new SqrtCalculatorCommand(), new NoopValidator());

    $calculator = new Calculator($registry);

   $controller  = new CalculatorController($calculator);
   $controller->handleAction();

   exit();
}

if($path === '/FAQ'){
    $controller = new FaqController();
    $controller->HandleAction();
}

print 'page not found';
exit();
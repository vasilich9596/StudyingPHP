<?php

use App\Controller\Blog\CreateBlogCommentController;
use App\Controller\Blog\ListBlogsController;
use App\Controller\Blog\ViewBlogController;
use App\Controller\CalculatorController;
use App\Controller\FaQ\FaqController;
use App\Controller\HomeController;
use App\Repository\BlogCommentRepository;
use App\Repository\blogRepository;
use App\Repository\FaqRepository;
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
use App\Service\TemplateRenderer;
use Symfony\Component\HttpFoundation\Request;

include_once __DIR__ . '/../config/bootstrap.php';

$request = Request::createFromGlobals();

$pdo = new \PDO('mysql:dbname=calculator_histories_database;host=learn-php-mysql', 'root', 'Q1w2e3r4');
$blogRepository = new blogRepository($pdo);
$blogCommentRepository = new BlogCommentRepository($pdo);
$FaqRepository = new FaqRepository($pdo);
$renderer = new TemplateRenderer();

if ($request->getRequestUri() === '/') {
    $controller = new HomeController($renderer);
    $controller->HandleAction();

    exit();
}

if (strpos($request->getRequestUri(), '/calculator') === 0) {
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

    $controller = new CalculatorController($calculator);
    $controller->handleAction();

    exit();
}

if ($request->getRequestUri() === '/FAQ') {
    $controller = new FaqController($FaqRepository,$renderer);
    $controller->HandleAction();

    exit();
}

if (strpos($request->getRequestUri(), '/Blogs') === 0) {
    if (\preg_match('#/Blogs/(\d+)#', $request->getRequestUri(), $parts)) {

        $controller = new ViewBlogController($renderer,$blogRepository, $blogCommentRepository);
        $controller->handleAction($parts[1]);

        exit();
    }
    if ($request->getRequestUri()  == '/Blogs/comments/new') {
        $controller = new CreateBlogCommentController($blogCommentRepository);
        $controller->handleAction($request);

      exit();
    }

    $controller = new ListBlogsController($blogRepository,$renderer);
    $controller->HandleAction();

    exit();
}

print 'page not found';
exit();
<?php

ini_set('display_errors',1);
ini_set('error_reporting', E_ALL);

include_once __DIR__.'/../vendor/autoload.php';

\Symfony\Component\ErrorHandler\Debug::enable();
\Symfony\Component\ErrorHandler\ErrorHandler::register();
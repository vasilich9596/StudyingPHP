<?php

include_once __DIR__ . '/../config/bootstrap.php';

$path = $_SERVER['REQUEST_URI'];

if ($path === '/') {
    include_once __DIR__ . '/pages/home.php';
    exit();
}

if ($path === '/calculator') {
    include_once __DIR__.'/pages/calculator.php';
    exit();
}

print 'page not found';
exit();
<?php

ini_set('display_errors',1);
ini_set('error_reporting',E_ALL);

include_once __DIR__.'/ReaderInterface.php';
include_once __DIR__.'/CsvReader.php';
include_once __DIR__.'/WriterInterface.php';
include_once __DIR__.'/CsvWriter.php';
include_once __DIR__.'/TxtWriter.php';
include_once __DIR__.'/ReportGenerator.php';

$reader = new CsvReader(__DIR__.'/lesson-14-report.xlsx - Sheet.csv');
$writer = new TxtWriter(__DIR__.'/lesson-14-report.txt');

$generator = new ReportGenerator($reader,$writer);
$generator->generate();
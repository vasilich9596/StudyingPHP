<?php

date_default_timezone_set('UTC');

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

$file = fopen(__DIR__ . '/lesson-14-report.xlsx - Sheet.csv', 'r+');

$reports = [];

fgetcsv($file);

while (!feof($file)) {
    $row = fgetcsv($file);

    $reports[] = [
        'mode' => $row[1],
        'date' => date_create_from_format('Y-m-d H:i:s', $row[2]),
        'type' => $row[4],
        'amount' => (int)$row[5]
    ];

}
$cardTotal = [];
$cashTotal = [];
$return = [];
$outputReport = [];

foreach ($reports as $report) {

    $date = date_format($report['date'], 'Y-m-d');

    if (!array_key_exists($date, $outputReport)) {
        $outputReport[$date] = [
            'cash' => 0,
            'card' => 0,
            'return' => 0,
        ];
    }
    if ($date == true) {
        if ($report['mode'] == 'SELL') {
            if ($report['type'] == 'Готівка') {
                $outputReport[$date]['cash'] += $report['amount'];
            }
        }
    }
    if ($date == true) {
        if ($report['mode'] == 'SELL') {
            if ($report['type'] == 'Картка') {
                $outputReport[$date]['card'] += $report['amount'];
            }
        }
    }
    if ($date == true) {
        if ($report['mode'] == 'RETURN') {
            $outputReport[$date]['return'] += $report['amount'];
        }
    }

}


$fileWrite = fopen(__DIR__ . '/lesson-14-Sheet.csv', 'w+');
ksort($outputReport);
foreach ($outputReport as $date => $info) {
    fputcsv($fileWrite, [
        $date,
        $info['cash'],
        $info['card'],
        $info['return']
    ]);
}
<?php

date_default_timezone_set('UTC');

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

$file = fopen(__DIR__ . '/lesson-14-report.xlsx - Sheet.csv', 'c+');

$reports = [];

fgetcsv($file);

while (!feof($file)) {
    $row = fgetcsv($file);

    $reports[] = [
        'mode' => $row[1],
        'date' => $row[2],
        'type' => $row[4],
        'amount' => $row[5]
    ];

}


$totalReports = [];
$cardTotal = 0;
$cashTotal = 0;

foreach ($reports as $data) {
    $mode = $data['mode'];
    $type = $data['type'];
    $date = $data['date'];
    $amount = $data['amount'];
    if (!array_key_exists($date, $totalReports)) {
        $totalReports[$date] = [];
    }

    if (!array_key_exists($mode, $totalReports[$date])) {
        $totalReports[$date][$mode] = [];
    }

    if (!array_key_exists($type, $totalReports[$date][$mode])) {
        $totalReports[$date][$mode][$type] = [];
    }

        $totalReports[$date][$mode][$type] = $amount;

}
print_r($totalReports);


//    if ($totalReports[$date][$mode] != 'RETURN') {
//        if ($totalReports[$date][$mode][$type] == 'Картка') {
//            $cardTotal = count($data['amount']);
//        } elseif ($totalReports[$mode] == 'Готівка') {
//            $cashTotal = count($data['amount']);
//        }
//    } else {
//        $return = count($data['amount']);
//    }



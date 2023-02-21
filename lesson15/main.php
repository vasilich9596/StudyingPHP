<?php

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

class ReportGenerator
{
    private $inputPath;
    private $outputPath;

    public function __construct($inputPath, $outputPath)
    {
        if (!file_exists($inputPath)) {
            throw new Exception('input file' . $inputPath . 'not exist');
        }
        $this->inputPath = $inputPath;
        $this->outputPath = $outputPath;
    }

    public function generate()
    {
        $reportData = $this->readData();

        ksort($reportData);

        $this->writeData($reportData);
    }

    private function readData()
    {
        $fileInfo = new SplFileInfo($this->inputPath);
        $file = $fileInfo->openFile('r+');

        $outputReport = [];

        $file->fgetcsv();

        while (!$file->eof()) {
            $row = $file->fgetcsv();

            $mode = $row[1];
            $date = DateTime::createFromFormat('Y-m-d H:i:s', $row[2]);
            $type = $row[4];
            $amount = $row[5];

            $dateKey = $date->format('Y-m-d');

            if (!isset($outputReport[$dateKey])) {
                $outputReport[$dateKey] = [
                    'cash' => 0,
                    'card' => 0,
                    'return' => 0,
                ];
            }

            if ($mode === 'SELL') {
                if ($type === 'Готівка') {
                    $outputReport[$dateKey]['cash'] += $amount;
                }
            } elseif ($mode === 'RETURN') {
                $outputReport[$dateKey]['return'] += $amount;
                $outputReport[$dateKey]['cash'] -= $amount;
            }

            if ($mode === 'SELL') {
                if ($type === 'Картка') {
                    $outputReport[$dateKey]['card'] += $amount;
                }
            }
        }
        return $outputReport;
    }

    private function writeData($reportData)
    {
        $fileInfo = new \SplFileInfo($this->outputPath);
        $file = $fileInfo->openFile('wb+');

        $file->fputcsv(['Date', 'Cash', 'Card', 'Return']);

        foreach ($reportData as $date => $info) {
            $file->fputcsv([
                $date,
                $info['cash'],
                $info['card'],
                $info['return'],
            ]);
        }
    }
}

$generator = new ReportGenerator(__DIR__ . '/lesson-14-report.xlsx - Sheet.csv', __DIR__ . '/lesson-14-Sheet.csv');

$generator->generate();
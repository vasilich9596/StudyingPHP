<?php

class  ReportGenerator
{
    private ReaderInterface $reader;
    private WriterInterface $writer;

    /**
     *
     * @param ReaderInterface $reader
     * @param WriterInterface $writer
     */
    public function __construct(ReaderInterface $reader, WriterInterface $writer)
    {

        $this->reader = $reader;
        $this->writer = $writer;
    }

    /**
     * @return void
     */

    public function generate(): void
    {
        $data = $this->reader->read();

        $report = [];

        foreach ($data as $item) {
            /** @var DateTime $date */
            $date = $item['date'];

            $day = $date->format('Y-m-d');

            if (!array_key_exists($day, $report)) {
                $report[$day] = [
                    'cash' => 0,
                    'card' => 0,
                    'return' => 0
                ];
            }

            if ($item['mode'] === 'SELL') {
                if ($item['type'] === 'Готівка') {
                    $report[$day]['cash'] += $item['amount'];
                }
            } elseif ($item['mode'] === 'RETURN') {
                $report[$day]['return'] += $item['amount'];
                $report[$day]['cash'] -= $item['amount'];
            }

            if ($item['mode'] === 'SELL') {
                if ($item['type'] === 'Картка') {
                    $report[$day]['card'] += $item['amount'];
                }
            }
        }
        ksort($report);
        $this->writer->writer($report);


    }
}
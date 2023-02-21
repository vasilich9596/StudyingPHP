<?php

class CsvWriter implements WriterInterface
{
    /**
     * @var string
     *
     */
    private string $outputPath;

    public function __construct(string $outputPath)
    {
        $this->outputPath = $outputPath;
    }

    /**
     * @param array $data
     * @return mixed|void
     *
     */
    public function writer(array $data): void
    {
        $file = new \SplFileObject($this->outputPath, 'wb');

        $file->fputcsv(['Date', 'Cash', 'Card', 'Return']);

        foreach ($data as $date => $entry) {
            $file->fputcsv([
                $date,
                $entry['cash'],
                $entry['card'],
                $entry['return'],
            ]);

        }
    }
}
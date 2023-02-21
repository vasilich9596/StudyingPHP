<?php

class CsvReader implements ReaderInterface
{
    /**
     * @var string
     */
    private string $inputFile;

    public function __construct(string $inputFile)
    {
        if (!file_exists($inputFile)){
            throw new Exception('not have input file');
        }
        $this->inputFile=$inputFile;
    }
    public function read(): array
    {
        $file = new \SplFileObject($this->inputFile,'r');

        $file->fgetcsv();

        $result =[];

        while (!$file->eof()) {
            $row = $file->fgetcsv();

            $result[] = [
                'mode' => $row[1],
                'date' => DateTime::createFromFormat('Y-m-d H:i:s', $row[2]),
                'type' => $row[4],
                'amount' => $row[5]
            ];

        }
        return $result;
    }

}
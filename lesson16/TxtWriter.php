<?php

class TxtWriter implements WriterInterface
{
    /**
     * @var string
     */
    private string $outputPath;

    /**
     * @param string $outputPath
     *
     * @throws Exception
     */
    public function __construct(string $outputPath)
    {

        $this->outputPath = $outputPath;
    }

    /**
     * @param array $data
     * @return void
     *
     */
    public function writer(array $data): void
    {
    $file = new SplFileObject($this->outputPath ,'wb');

        foreach ($data as $date => $entry) {
            $file->fwrite('date - '.$date.': cash - '.$entry['cash'].': card - '.$entry['card'].': return - '.$entry['return'].PHP_EOL);
    }

    }
}
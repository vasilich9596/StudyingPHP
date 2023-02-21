<?php

class JsonWriter implements WriterInterface
{
    private string $outputPath;

    public function __construct(string $outputPath)
    {
        $this->outputPath = $outputPath;
    }

    public function writer(array $data): void
    {
        $jsonFile = json_encode($data);

        file_put_contents($this->outputPath, $jsonFile);
    }
}
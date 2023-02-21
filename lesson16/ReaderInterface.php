<?php

interface ReaderInterface
{
    /**
     * read data
     *
     * @return array
     */
    public function read(): array;
}
<?php

interface WriterInterface
{
    /**
     * write data
     *
     * @param array $data
     * @return mixed
     */
    public function writer(array $data): void;
}
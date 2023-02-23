<?php

class CalculatorCommandRegistry
{
    /**
     * @var array
     */
    private array $commands = [];

    /**
     * @param string $commandName
     * @param CalculatorCommandInterface $command
     * @return void
     *
     */
    public function add(string $commandName, CalculatorCommandInterface $command): void
    {
        $this->commands[$commandName] = $command;
    }

    /**
     * @param string $commandName
     * @return CalculatorCommandInterface
     * @throws Exception
     *
     */
    public function get(string $commandName): CalculatorCommandInterface
    {
        if (!array_key_exists($commandName, $this->commands)) {
            throw new Exception(sprintf('not have command %s', $commandName));
        }

        return $this->commands[$commandName];
    }
}

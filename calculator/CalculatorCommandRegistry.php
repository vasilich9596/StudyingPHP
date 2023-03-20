<?php

namespace Calculator;

use Calculator\Command\CalculatorCommandInterface;
use Calculator\Validator\CalculatorArgumentsValidatorInterface;

class CalculatorCommandRegistry
{
    /**
     * @var array
     */
    private array $commands = [];

    /**
     * @var array<CalculatorArgumentsValidatorInterface>
     */
    private array $validators= [];

    /**
     * @param string $commandName
     * @param CalculatorCommandInterface $command
     * @return void
     *
     */
    public function add(string $commandName, CalculatorCommandInterface $command, CalculatorArgumentsValidatorInterface $validator): void
    {
        $this->commands[$commandName] = $command;
        $this->validators[$commandName] = $validator;
    }


    /**
     * @param string $commandName
     * @return CalculatorCommandInterface
     * @throws \Exception
     *
     */
    public function getCommand(string $commandName): CalculatorCommandInterface
    {
        if (!array_key_exists($commandName, $this->commands)) {
            throw new \Exception(\sprintf('not have command %s', $commandName));
        }

        return $this->commands[$commandName];
    }
    public function getValidator(string $commandName): CalculatorArgumentsValidatorInterface
    {
        if (!\array_key_exists($commandName,$this->validators)){
            throw new \Exception(\sprintf('validator with name "%s" not found',$commandName));
        }

        return $this->validators[$commandName];
    }

}

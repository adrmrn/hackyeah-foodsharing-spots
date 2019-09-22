<?php
declare(strict_types=1);

namespace Adapter\Common\Application;


use Core\Common\Application\CommandBus;

class SimpleCommandBus implements CommandBus
{
    /**
     * @var array
     */
    private $handlers = [];

    public function dispatch($command)
    {
        if (!is_object($command)) {
            throw new \RuntimeException('Command must be provided as object while dispatching.');
        }

        if (!isset($this->handlers[get_class($command)])) {
            throw new \RuntimeException('Handler for command is not set.');
        }

        $handlerClass = $this->handlers[get_class($command)];
        $handler = app($handlerClass);
        return $handler->handle($command);
    }

    public function addHandler(string $commandClass, string $handlerClass): void
    {
        if (!class_exists($commandClass)) {
            throw new \RuntimeException('Command does not exist.');
        }

        if (!class_exists($handlerClass)) {
            throw new \RuntimeException('Handler does not exist.');
        }

        if (!method_exists($handlerClass, 'handle')) {
            throw new \RuntimeException('Handler must have handle method.');
        }

        $this->handlers[$commandClass] = $handlerClass;
    }
}
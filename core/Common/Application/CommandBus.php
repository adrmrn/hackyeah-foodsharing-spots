<?php
declare(strict_types=1);

namespace Core\Common\Application;


interface CommandBus
{
    public function dispatch($command);
    public function addHandler(
        string $commandClass,
        string $handlerClass
    ): void;
}
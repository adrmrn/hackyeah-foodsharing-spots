<?php
declare(strict_types=1);

namespace Core\Spot\Domain\Exception;


use Core\Common\Domain\Exception\InvalidArgumentException;

class InvalidTimeException extends InvalidArgumentException
{
    public function __construct(string $message = 'Hour is invalid.')
    {
        parent::__construct($message);
    }
}
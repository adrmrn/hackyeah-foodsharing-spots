<?php
declare(strict_types=1);

namespace Core\Spot\Domain\Exception;


use Core\Common\Domain\Exception\InvalidArgumentException;

class InvalidLatitudeValueException extends InvalidArgumentException
{
    public function __construct(string $message = 'Latitude value is invalid.')
    {
        parent::__construct($message);
    }
}
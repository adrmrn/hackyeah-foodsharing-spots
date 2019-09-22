<?php
declare(strict_types=1);

namespace Core\Common\Domain\Exception;


class InvalidAggregateIdException extends InvalidArgumentException
{
    public function __construct(
        string $message = 'Provided ID string is invalid.'
    ) {
        parent::__construct($message);
    }
}
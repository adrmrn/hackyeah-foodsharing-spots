<?php
declare(strict_types=1);

namespace Core\Common\Application\Exception;


class NotFoundException extends ApplicationException
{
    public function __construct(string $message = 'Not found.')
    {
        parent::__construct($message);
    }
}
<?php
declare(strict_types=1);

namespace Core\Common\Application\Exception;

class ValidationException extends \InvalidArgumentException
{
    /**
     * @var array
     */
    private $errors = [];

    public function __construct($errors = [])
    {
        parent::__construct('Validation exception. Invalid arguments provided.');

        $this->errors = $errors;
    }

    public function errors(): array
    {
        return $this->errors;
    }
}
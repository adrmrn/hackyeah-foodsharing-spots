<?php
declare(strict_types=1);

namespace Core\Common\Application;


use Core\Common\Application\Exception\ValidationException;

interface Validator
{
    /**
     * @param array $data
     * @param array $rules
     * @param array $messages
     * @throws ValidationException
     */
    public function validate(array $data, array $rules, array $messages = []): void;
}
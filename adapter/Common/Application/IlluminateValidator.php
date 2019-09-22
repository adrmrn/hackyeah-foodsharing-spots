<?php
declare(strict_types=1);

namespace Adapter\Common\Application;

use Core\Common\Application\Exception\ValidationException;
use Core\Common\Application\Validator;
use Illuminate\Validation\Factory as ValidatorFactory;

class IlluminateValidator implements Validator
{
    /**
     * @var ValidatorFactory
     */
    private $validatorFactory;

    public function __construct(ValidatorFactory $validatorFactory)
    {
        $this->validatorFactory = $validatorFactory;
    }

    /**
     * @param array $data
     * @param array $rules
     * @param array $messages
     * @throws ValidationException
     */
    public function validate(array $data, array $rules, array $messages = []): void
    {
        foreach ($rules as $attribute => $rulesArray) {
            if (!is_array($rulesArray)) {
                throw new \RuntimeException('Rules set must be provided as array.');
            }
        }

        $validator = $this->validatorFactory->make($data, $rules, $messages);
        if ($validator->fails()) {
            throw new ValidationException($validator->errors()->toArray());
        }
    }
}
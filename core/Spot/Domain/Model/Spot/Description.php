<?php
declare(strict_types=1);

namespace Core\Spot\Domain\Model\Spot;


use Core\Spot\Domain\Exception\InvalidDescriptionException;

class Description
{
    private const MAX_LENGTH = 1000;

    /**
     * @var string
     */
    private $description;

    public function __construct(string $description)
    {
        if (mb_strlen($description) > self::MAX_LENGTH) {
            throw new InvalidDescriptionException();
        }

        $this->description = $description;
    }

    public function toString(): string
    {
        return $this->description;
    }
}
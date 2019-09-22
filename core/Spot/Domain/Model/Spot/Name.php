<?php
declare(strict_types=1);

namespace Core\Spot\Domain\Model\Spot;


use Core\Spot\Domain\Exception\InvalidNameException;

class Name
{
    private const MIN_LENGTH = 1;
    private const MAX_LENGTH = 255;

    /**
     * @var string
     */
    private $name;

    public function __construct(string $name)
    {
        if (mb_strlen($name) < self::MIN_LENGTH || mb_strlen($name) > self::MAX_LENGTH) {
            throw new InvalidNameException();
        }

        $this->name = $name;
    }

    public function toString(): string
    {
        return $this->name;
    }
}
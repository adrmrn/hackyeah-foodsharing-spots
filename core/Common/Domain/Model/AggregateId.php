<?php
declare(strict_types=1);

namespace Core\Common\Domain\Model;


use Core\Common\Domain\Exception\InvalidAggregateIdException;

trait AggregateId
{
    /**
     * @var string
     */
    private $id;

    private function __construct(string $id)
    {
        if (empty($id)) {
            throw new InvalidAggregateIdException();
        }

        $this->id = $id;
    }

    public function isEquals(self $otherAggregateId): bool
    {
        return $this->id === $otherAggregateId->id;
    }

    public static function fromString(string $id): self
    {
        return new self($id);
    }

    public function toString(): string
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->toString();
    }
}
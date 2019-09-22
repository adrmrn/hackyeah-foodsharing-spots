<?php
declare(strict_types=1);

namespace Adapter\Common\Domain\Model;

use Adapter\Common\Domain\Exception\InvalidUuidProvidedException;
use Core\Common\Domain\Model\Guid;
use Ramsey\Uuid\UuidInterface;

class Uuid implements Guid
{
    /**
     * @var UuidInterface
     */
    private $uuid;

    public function __construct(UuidInterface $uuid)
    {
        $this->uuid = $uuid;
    }

    public function toString(): string
    {
        return $this->uuid->toString();
    }

    public static function fromString(string $uuid): Guid
    {
        try {
            $uuid = new self(\Ramsey\Uuid\Uuid::fromString($uuid));
        } catch (\Ramsey\Uuid\Exception\InvalidUuidStringException $exception) {
            throw new InvalidUuidProvidedException('Invalid guid string provided. Invalid argument exception.');
        }

        return $uuid;
    }
}
<?php
declare(strict_types=1);

namespace Adapter\Common\Domain\Factory;


use Adapter\Common\Domain\Model\Uuid;
use Core\Common\Domain\Factory\GuidFactory;
use Core\Common\Domain\Model\Guid;
use Ramsey\Uuid\Uuid as RamseyUuid;

class UuidFactory implements GuidFactory
{
    public function generate(): Guid
    {
        return Uuid::fromString(RamseyUuid::uuid4()->toString());
    }
}
<?php
declare(strict_types=1);

namespace Core\Spot\Infrastructure\Doctrine\Orm\Type;


use Core\Spot\Domain\Model\Spot\SpotId;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class SpotIdType extends \Doctrine\DBAL\Types\Type
{
    const NAME = 'SpotId';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return SpotId::fromString($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value instanceof SpotId) {
            return $value->toString();
        }

        throw new \RuntimeException();
    }

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        throw new \RuntimeException();
    }

    public function getName()
    {
        return self::NAME;
    }
}
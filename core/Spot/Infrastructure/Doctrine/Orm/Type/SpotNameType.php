<?php
declare(strict_types=1);

namespace Core\Spot\Infrastructure\Doctrine\Orm\Type;


use Core\Spot\Domain\Model\Spot\Name;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class SpotNameType extends \Doctrine\DBAL\Types\Type
{
    const NAME = 'SpotName';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new Name($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value instanceof Name) {
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
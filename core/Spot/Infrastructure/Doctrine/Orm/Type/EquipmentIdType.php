<?php
declare(strict_types=1);

namespace Core\Spot\Infrastructure\Doctrine\Orm\Type;


use Core\Spot\Domain\Model\Equipment\EquipmentId;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class EquipmentIdType extends \Doctrine\DBAL\Types\Type
{
    const NAME = 'EquipmentId';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return EquipmentId::fromString($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value instanceof EquipmentId) {
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
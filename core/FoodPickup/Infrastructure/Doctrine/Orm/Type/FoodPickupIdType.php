<?php
declare(strict_types=1);

namespace Core\FoodPickup\Infrastructure\Doctrine\Orm\Type;

use Core\FoodPickup\Domain\Model\FoodPickup\FoodPickupId;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class FoodPickupIdType extends \Doctrine\DBAL\Types\Type
{
    const NAME = 'FoodPickupId';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return FoodPickupId::fromString($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value instanceof FoodPickupId) {
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
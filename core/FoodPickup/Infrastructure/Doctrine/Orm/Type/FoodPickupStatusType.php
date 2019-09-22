<?php
declare(strict_types=1);

namespace Core\FoodPickup\Infrastructure\Doctrine\Orm\Type;

use Core\FoodPickup\Domain\Model\FoodPickup\Status;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class FoodPickupStatusType extends \Doctrine\DBAL\Types\Type
{
    const NAME = 'FoodPickupStatus';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        switch ($value) {
            case 'pending':
                $type = Status::pending();
                break;

            case 'completed':
                $type = Status::completed();
                break;

            default:
                throw new \RuntimeException();
        }

        return $type;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value instanceof Status) {
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
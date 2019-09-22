<?php
declare(strict_types=1);

namespace Core\Spot\Infrastructure\Doctrine\Orm\Type;


use Core\Spot\Domain\Model\Equipment\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class EquipmentTypeType extends \Doctrine\DBAL\Types\Type
{
    const NAME = 'EquipmentType';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        switch ($value) {
            case 'fridge':
                $type = Type::fridge();
                break;

            case 'shelf':
                $type = Type::shelf();
                break;

            default:
                throw new \RuntimeException();
        }

        return $type;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value instanceof Type) {
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
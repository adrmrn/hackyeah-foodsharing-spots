<?php
declare(strict_types=1);

namespace Core\Spot\Infrastructure\Doctrine\Orm\Type;


use Core\Spot\Domain\Model\Spot\Description;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class SpotDescriptionType extends \Doctrine\DBAL\Types\Type
{
    const NAME = 'SpotDescription';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if (is_null($value)) {
            return null;
        }

        return new Description($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (is_null($value)) {
            return null;
        }

        if ($value instanceof Description) {
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
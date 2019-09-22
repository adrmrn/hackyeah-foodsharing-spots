<?php
declare(strict_types=1);

namespace Core\Spot\Domain\Model\Spot\Localization;


use Core\Spot\Domain\Exception\InvalidLatitudeValueException;
use Core\Spot\Domain\Exception\InvalidLongitudeValueException;

class Coordinates
{
    /**
     * @var float
     */
    private $latitude;
    /**
     * @var float
     */
    private $longitude;

    public function __construct(float $latitude, float $longitude)
    {
        $this->validateLatitude($latitude);
        $this->validateLongitude($longitude);

        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function latitude(): float
    {
        return $this->latitude;
    }

    public function longitude(): float
    {
        return $this->longitude;
    }

    /**
     * @param float $latitude
     * @throws InvalidLatitudeValueException
     */
    private function validateLatitude(float $latitude): void
    {
        $latitudeRegex = '/^(\+|-)?(?:90(?:(?:\.0{1,12})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,12})?))$/';
        if (!preg_match($latitudeRegex, (string)$latitude)) {
            throw new InvalidLatitudeValueException();
        }
    }

    /**
     * @param float $longitude
     * @throws InvalidLongitudeValueException
     */
    private function validateLongitude(float $longitude): void
    {
        $longitudeRegex = '/^(\+|-)?(?:180(?:(?:\.0{1,14})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1,12})?))$/';
        if (!preg_match($longitudeRegex, (string)$longitude)) {
            throw new InvalidLongitudeValueException();
        }
    }
}
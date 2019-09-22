<?php
declare(strict_types=1);

namespace Core\Spot\Domain\Model\Spot;


use Core\Spot\Domain\Model\Spot\Localization\Address;
use Core\Spot\Domain\Model\Spot\Localization\Coordinates;

class Localization
{
    /**
     * @var Address
     */
    private $address;
    /**
     * @var \Core\Spot\Domain\Model\Spot\Localization\Coordinates
     */
    private $coordinates;

    public function __construct(Address $address, Coordinates $coordinates)
    {
        $this->address = $address;
        $this->coordinates = $coordinates;
    }

    public function address(): Address
    {
        return $this->address;
    }

    public function coordinates(): Coordinates
    {
        return $this->coordinates;
    }
}
<?php
declare(strict_types=1);

namespace Core\Spot\Application\ReadModel;


use Core\Common\Application\ReadModel;

class SpotReadModel implements ReadModel
{
    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string|null
     */
    private $description;
    /**
     * @var bool
     */
    private $isOpenRoundTheClock;
    /**
     * @var string
     */
    private $street;
    /**
     * @var string
     */
    private $city;
    /**
     * @var string
     */
    private $postalCode;
    /**
     * @var string
     */
    private $latitude;
    /**
     * @var string
     */
    private $longitude;
    /**
     * @var EquipmentReadModel[]
     */
    private $equipments;

    public function __construct(
        string $id,
        string $name,
        ?string $description,
        bool $isOpenRoundTheClock,
        string $street,
        string $city,
        string $postalCode,
        string $latitude,
        string $longitude,
        array $equipments
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->isOpenRoundTheClock = $isOpenRoundTheClock;
        $this->street = $street;
        $this->city = $city;
        $this->postalCode = $postalCode;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->equipments = $equipments;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'isOpenRoundTheClock' => $this->isOpenRoundTheClock,
            'localization' => [
                'street' => $this->street,
                'city' => $this->city,
                'postalCode' => $this->postalCode,
                'coordinates' => [
                    'latitude' => $this->latitude,
                    'longitude' => $this->longitude
                ]
            ],
            'equipments' => array_map(function (EquipmentReadModel $equipmentReadModel) {
                return $equipmentReadModel->toArray();
            }, $this->equipments)
        ];
    }
}
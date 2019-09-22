<?php
declare(strict_types=1);

namespace Core\Spot\Application\Query\GetEquipmentsForSpot;


use Core\Common\Application\Exception\NotFoundException;
use Core\Common\Application\Query\Handler;
use Core\Spot\Application\DataSource\EquipmentDataSource;
use Core\Spot\Application\DataSource\SpotDataSource;

class GetEquipmentsForSpotHandler implements Handler
{
    /**
     * @var SpotDataSource
     */
    private $spotDataSource;
    /**
     * @var EquipmentDataSource
     */
    private $equipmentDataSource;

    public function __construct(SpotDataSource $spotDataSource, EquipmentDataSource $equipmentDataSource)
    {
        $this->spotDataSource = $spotDataSource;
        $this->equipmentDataSource = $equipmentDataSource;
    }

    /**
     * @param GetEquipmentsForSpotQuery $query
     * @return array
     * @throws NotFoundException
     */
    public function handle(GetEquipmentsForSpotQuery $query): array
    {
        if (!$this->spotDataSource->exists($query->spotId())) {
            throw new NotFoundException('Spot not found.');
        }

        return $this->equipmentDataSource->getAllForSpot($query->spotId());
    }
}
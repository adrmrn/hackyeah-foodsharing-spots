<?php
declare(strict_types=1);

namespace Core\Spot\Application\DataSource;


use Core\Spot\Application\ReadModel\EquipmentReadModel;

interface EquipmentDataSource
{
    /**
     * @param string $spotId
     * @return EquipmentReadModel[]
     */
    public function getAllForSpot(string $spotId): array;
}
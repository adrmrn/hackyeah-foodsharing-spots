<?php
declare(strict_types=1);

namespace Core\Spot\Domain\Repository;


use Core\Spot\Domain\Model\Equipment;
use Core\Spot\Domain\Model\Equipment\EquipmentId;
use Core\Spot\Domain\Model\Spot;
use Core\Spot\Domain\Model\Spot\SpotId;

interface EquipmentRepository
{
    public function getById(EquipmentId $id): Equipment;

    /**
     * @param SpotId $spotId
     * @return Spot[]
     */
    public function getAllBySpotId(SpotId $spotId): array;
}
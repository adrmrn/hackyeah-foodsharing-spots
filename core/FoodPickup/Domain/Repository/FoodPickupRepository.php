<?php
declare(strict_types=1);

namespace Core\FoodPickup\Domain\Repository;

use Core\FoodPickup\Domain\Exception\FoodPickupNotFound;
use Core\FoodPickup\Domain\Model\FoodPickup;
use Core\FoodPickup\Domain\Model\FoodPickup\FoodPickupId;

interface FoodPickupRepository
{
    public function persist(FoodPickup $foodPickup): void;

    /**
     * @param FoodPickupId $id
     * @return FoodPickup
     * @throws FoodPickupNotFound
     */
    public function getById(FoodPickupId $id): FoodPickup;
}
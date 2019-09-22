<?php
declare(strict_types=1);

namespace Core\FoodPickup\Domain\Model;

use Core\Common\Domain\Model\Guid;
use Core\FoodPickup\Domain\Model\FoodPickup\ContactDetails;
use Core\FoodPickup\Domain\Model\FoodPickup\FoodPickupId;

class FoodPickupFactory
{
    public function create(Guid $guid, string $name, string $email, string $phone): FoodPickup
    {
        return new FoodPickup(
            FoodPickupId::fromString($guid->toString()),
            new ContactDetails(
                $name,
                $email,
                $phone
            )
        );
    }
}
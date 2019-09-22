<?php
declare(strict_types=1);

namespace Core\FoodPickup\Domain\Exception;

use Core\Common\Domain\Exception\NotFoundException;

class FoodPickupNotFound extends NotFoundException
{
    public function __construct($message = 'Food Pickup not found.')
    {
        parent::__construct($message);
    }
}
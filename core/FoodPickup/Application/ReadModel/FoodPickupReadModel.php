<?php
declare(strict_types=1);

namespace Core\FoodPickup\Application\ReadModel;

use Core\Common\Application\ReadModel;

class FoodPickupReadModel implements ReadModel
{
    /**
     * @var string
     */
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id
        ];
    }
}
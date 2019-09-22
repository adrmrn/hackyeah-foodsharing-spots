<?php
declare(strict_types=1);

namespace Core\Spot\Application\Query\GetEquipmentsForSpot;


use Core\Common\Application\Query\Query;

class GetEquipmentsForSpotQuery implements Query
{
    /**
     * @var string
     */
    private $spotId;

    public function __construct(string $spotId)
    {
        $this->spotId = $spotId;
    }

    public function spotId(): string
    {
        return $this->spotId;
    }
}
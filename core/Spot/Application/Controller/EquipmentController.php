<?php
declare(strict_types=1);

namespace Core\Spot\Application\Controller;


use Core\Common\Application\CommandBus;
use Core\Common\Application\ReadModel;
use Core\Spot\Application\Query\GetEquipmentsForSpot\GetEquipmentsForSpotHandler;
use Core\Spot\Application\Query\GetEquipmentsForSpot\GetEquipmentsForSpotQuery;

class EquipmentController
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
        $this->commandBus->addHandler(GetEquipmentsForSpotQuery::class, GetEquipmentsForSpotHandler::class);
    }

    /**
     * @param string $spotId
     * @return ReadModel[]
     */
    public function getEquipmentsForSpot(string $spotId): array
    {
        $query = new GetEquipmentsForSpotQuery($spotId);
        return $this->commandBus->dispatch($query);
    }
}
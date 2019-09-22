<?php
declare(strict_types=1);

namespace Core\Spot\Application\Controller;


use Core\Common\Application\CommandBus;
use Core\Common\Application\ReadModel;
use Core\Spot\Application\Query\GetSpots\GetSpotsHandler;
use Core\Spot\Application\Query\GetSpots\GetSpotsQuery;

class SpotController
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
        $this->commandBus->addHandler(GetSpotsQuery::class, GetSpotsHandler::class);
    }

    /**
     * @return ReadModel[]
     */
    public function getSpots(): array
    {
        $query = new GetSpotsQuery();
        return $this->commandBus->dispatch($query);
    }
}
<?php
declare(strict_types=1);

namespace Core\Spot\Application\Query\GetSpots;


use Core\Common\Application\Query\Handler;
use Core\Spot\Application\DataSource\SpotDataSource;
use Core\Spot\Application\ReadModel\SpotReadModel;

class GetSpotsHandler implements Handler
{
    /**
     * @var SpotDataSource
     */
    private $spotDataSource;

    public function __construct(SpotDataSource $spotDataSource)
    {
        $this->spotDataSource = $spotDataSource;
    }

    /**
     * @param GetSpotsQuery $query
     * @return SpotReadModel[]
     */
    public function handle(GetSpotsQuery $query): array
    {
        return $this->spotDataSource->getAll();
    }
}
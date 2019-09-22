<?php
declare(strict_types=1);

namespace Core\Spot\Application\DataSource;


use Core\Spot\Application\ReadModel\SpotReadModel;

interface SpotDataSource
{
    /**
     * @return SpotReadModel[]
     */
    public function getAll(): array;
    public function exists(string $spotId): bool;
}
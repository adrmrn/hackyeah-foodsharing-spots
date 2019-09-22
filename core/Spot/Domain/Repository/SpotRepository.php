<?php
declare(strict_types=1);

namespace Core\Spot\Domain\Repository;


use Core\Spot\Domain\Model\Spot;
use Core\Spot\Domain\Model\Spot\SpotId;

interface SpotRepository
{
    public function getById(SpotId $id): Spot;
}
<?php
declare(strict_types=1);

namespace App\Providers;


use Adapter\Common\Application\IlluminateValidator;
use Adapter\Common\Application\SimpleCommandBus;
use Adapter\Common\Domain\Factory\UuidFactory;
use Adapter\FoodPickup\Domain\Repository\DoctrineFoodPickupRepository;
use Adapter\Spot\Application\DataSource\DbalEquipmentDataSource;
use Adapter\Spot\Application\DataSource\DbalSpotDataSource;
use Core\Common\Application\CommandBus;
use Core\Common\Application\Validator;
use Core\Common\Domain\Factory\GuidFactory;
use Core\FoodPickup\Domain\Repository\FoodPickupRepository;
use Core\Spot\Application\DataSource\EquipmentDataSource;
use Core\Spot\Application\DataSource\SpotDataSource;
use Illuminate\Support\ServiceProvider;

class ContractsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(GuidFactory::class, UuidFactory::class);
        $this->app->bind(CommandBus::class, SimpleCommandBus::class);
        $this->app->bind(SpotDataSource::class, DbalSpotDataSource::class);
        $this->app->bind(EquipmentDataSource::class, DbalEquipmentDataSource::class);
        $this->app->bind(Validator::class, IlluminateValidator::class);
        $this->app->bind(FoodPickupRepository::class, DoctrineFoodPickupRepository::class);
    }
}
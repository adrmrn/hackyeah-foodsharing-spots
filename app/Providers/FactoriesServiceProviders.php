<?php
declare(strict_types=1);

namespace App\Providers;


use Adapter\Common\Infrastructure\Doctrine\Dbal\DbalConnectionFactory;
use Doctrine\DBAL\Connection;
use Illuminate\Support\ServiceProvider;

class FactoriesServiceProviders extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(Connection::class, function() {
            $factory = new DbalConnectionFactory();
            return $factory->create();
        });
    }
}
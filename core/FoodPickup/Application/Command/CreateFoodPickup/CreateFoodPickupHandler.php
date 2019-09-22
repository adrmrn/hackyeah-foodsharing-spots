<?php
declare(strict_types=1);

namespace Core\FoodPickup\Application\Command\CreateFoodPickup;

use Core\Common\Application\Command\Handler;
use Core\FoodPickup\Domain\Model\FoodPickupFactory;
use Core\FoodPickup\Domain\Repository\FoodPickupRepository;

class CreateFoodPickupHandler implements Handler
{
    /**
     * @var FoodPickupFactory
     */
    private $factory;
    /**
     * @var FoodPickupRepository
     */
    private $foodPickupRepository;

    public function __construct(FoodPickupFactory $factory, FoodPickupRepository $foodPickupRepository)
    {
        $this->factory = $factory;
        $this->foodPickupRepository = $foodPickupRepository;
    }

    public function handle(CreateFoodPickupCommand $command): void
    {
        $foodPickup = $this->factory->create(
            $command->guid(),
            $command->name(),
            $command->email(),
            $command->phone()
        );
        $this->foodPickupRepository->persist($foodPickup);
    }
}
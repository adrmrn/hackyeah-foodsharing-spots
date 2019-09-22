<?php
declare(strict_types=1);

namespace Core\FoodPickup\Application\Controller;

use Core\Common\Application\CommandBus;
use Core\Common\Application\ReadModel;
use Core\Common\Application\Validator;
use Core\Common\Domain\Factory\GuidFactory;
use Core\FoodPickup\Application\Command\CreateFoodPickup\CreateFoodPickupCommand;
use Core\FoodPickup\Application\Command\CreateFoodPickup\CreateFoodPickupHandler;
use Core\FoodPickup\Application\ReadModel\FoodPickupReadModel;

class FoodPickupController
{
    /**
     * @var CommandBus
     */
    private $commandBus;
    /**
     * @var GuidFactory
     */
    private $guidFactory;
    /**
     * @var Validator
     */
    private $validator;

    public function __construct(CommandBus $commandBus, GuidFactory $guidFactory, Validator $validator)
    {
        $this->commandBus = $commandBus;
        $this->commandBus->addHandler(CreateFoodPickupCommand::class, CreateFoodPickupHandler::class);
        $this->guidFactory = $guidFactory;
        $this->validator = $validator;
    }

    public function create(array $data): ReadModel
    {
        $this->validator->validate($data, [
            'name' => ['required', 'string', 'min:1', 'max: 255'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string', 'min:9', 'max:9']
        ]);
        $guid = $this->guidFactory->generate();
        $command = new CreateFoodPickupCommand(
            $guid,
            $data['name'],
            $data['email'],
            $data['phone']
        );
        $this->commandBus->dispatch($command);

        return $this->getById($guid->toString());
    }

    public function getById(string $id): ReadModel
    {
        return new FoodPickupReadModel($id);
    }
}
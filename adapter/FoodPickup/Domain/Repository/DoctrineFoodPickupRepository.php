<?php
declare(strict_types=1);

namespace Adapter\FoodPickup\Domain\Repository;

use Core\FoodPickup\Domain\Exception\FoodPickupNotFound;
use Core\FoodPickup\Domain\Model\FoodPickup;
use Core\FoodPickup\Domain\Model\FoodPickup\FoodPickupId;
use Core\FoodPickup\Domain\Repository\FoodPickupRepository;
use Doctrine\ORM\EntityManager;

class DoctrineFoodPickupRepository implements FoodPickupRepository
{
    /**
     * @var EntityManager
     */
    private $entityManager;
    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository
     */
    private $repository;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository(FoodPickup::class);
    }

    public function persist(FoodPickup $foodPickup): void
    {
        $this->entityManager->persist($foodPickup);
        $this->entityManager->flush();
    }

    /**
     * @param FoodPickupId $id
     * @return FoodPickup
     * @throws FoodPickupNotFound
     */
    public function getById(FoodPickupId $id): FoodPickup
    {
        $foodPickup = $this->repository->find($id);
        if (!($foodPickup instanceof FoodPickup)) {
            throw new FoodPickupNotFound();
        }

        return $foodPickup;
    }

}
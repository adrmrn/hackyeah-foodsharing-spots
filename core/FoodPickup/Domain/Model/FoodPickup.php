<?php
declare(strict_types=1);

namespace Core\FoodPickup\Domain\Model;

use Core\FoodPickup\Domain\Model\FoodPickup\ContactDetails;
use Core\FoodPickup\Domain\Model\FoodPickup\FoodPickupId;
use Core\FoodPickup\Domain\Model\FoodPickup\Status;

class FoodPickup
{
    /**
     * @var FoodPickupId
     */
    private $id;
    /**
     * @var ContactDetails
     */
    private $contactDetails;
    /**
     * @var Status
     */
    private $status;

    public function __construct(FoodPickupId $id, ContactDetails $contactDetails)
    {
        $this->id = $id;
        $this->contactDetails = $contactDetails;
        $this->status = Status::pending();
    }

    public function id(): FoodPickupId
    {
        return $this->id;
    }

    public function contactDetails(): ContactDetails
    {
        return $this->contactDetails;
    }

    public function status(): Status
    {
        return $this->status;
    }
}
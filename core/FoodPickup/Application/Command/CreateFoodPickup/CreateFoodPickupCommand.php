<?php
declare(strict_types=1);

namespace Core\FoodPickup\Application\Command\CreateFoodPickup;

use Core\Common\Application\Command\Command;
use Core\Common\Domain\Model\Guid;

class CreateFoodPickupCommand implements Command
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $phone;
    /**
     * @var Guid
     */
    private $guid;

    public function __construct(Guid $guid, string $name, string $email, string $phone)
    {
        $this->guid = $guid;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }

    public function guid(): Guid
    {
        return $this->guid;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function phone(): string
    {
        return $this->phone;
    }
}
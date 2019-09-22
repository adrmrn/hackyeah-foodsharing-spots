<?php
declare(strict_types=1);

namespace Core\Spot\Domain\Model;


use Core\Spot\Domain\Model\Equipment\EquipmentId;
use Core\Spot\Domain\Model\Equipment\Type;
use Core\Spot\Domain\Model\Spot\SpotId;

class Equipment
{
    /**
     * @var EquipmentId
     */
    private $id;
    /**
     * @var SpotId
     */
    private $spotId;
    /**
     * @var Type
     */
    private $type;

    public function __construct(EquipmentId $id, SpotId $spotId, Type $type)
    {
        $this->id = $id;
        $this->spotId = $spotId;
        $this->type = $type;
    }

    public function id(): EquipmentId
    {
        return $this->id;
    }

    public function spotId(): SpotId
    {
        return $this->spotId;
    }

    public function type(): Type
    {
        return $this->type;
    }
}
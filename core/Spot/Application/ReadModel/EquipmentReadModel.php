<?php
declare(strict_types=1);

namespace Core\Spot\Application\ReadModel;


use Core\Common\Application\ReadModel;

class EquipmentReadModel implements ReadModel
{
    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $spotId;
    /**
     * @var string
     */
    private $type;

    public function __construct(string $id, string $spotId, string $type)
    {
        $this->id = $id;
        $this->spotId = $spotId;
        $this->type = $type;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'spotId' => $this->spotId,
            'type' => $this->type
        ];
    }
}
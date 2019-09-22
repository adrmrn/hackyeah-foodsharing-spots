<?php
declare(strict_types=1);

namespace Core\Spot\Domain\Model\Equipment;


class Type
{
    private const FRIDGE = 'fridge';
    private const SHELF = 'shelf';
    /**
     * @var string
     */
    private $type;

    private function __construct(string $type)
    {
        $this->type = $type;
    }

    public function toString(): string
    {
        return $this->type;
    }

    public static function fridge(): self
    {
        return new self(self::FRIDGE);
    }

    public static function shelf(): self
    {
        return new self(self::SHELF);
    }
}
<?php
declare(strict_types=1);

namespace Core\FoodPickup\Domain\Model\FoodPickup;

final class Status
{
    private const PENDING = 'pending';
    private const COMPLETED = 'completed';
    /**
     * @var string
     */
    private $status;

    private function __construct(string $status)
    {
        $this->status = $status;
    }

    public static function pending(): self
    {
        return new self(self::PENDING);
    }

    public static function completed(): self
    {
        return new self(self::COMPLETED);
    }

    public function toString(): string
    {
        return $this->status;
    }
}
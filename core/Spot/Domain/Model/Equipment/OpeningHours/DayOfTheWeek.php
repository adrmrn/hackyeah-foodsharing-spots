<?php
declare(strict_types=1);

namespace Core\Spot\Domain\Model\Equipment\OpeningHours;


class DayOfTheWeek
{
    private const MONDAY = 'monday';
    private const TUESDAY = 'tuesday';
    private const WEDNESDAY = 'wednesday';
    private const THURSDAY = 'thursday';
    private const FRIDAY = 'friday';
    private const SATURDAY = 'saturday';
    private const SUNDAY = 'sunday';
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
    
    public static function monday(): self
    {
        return new self(self::MONDAY);
    }
    
    public static function tuesday(): self
    {
        return new self(self::TUESDAY);
    }

    public static function wednesday(): self
    {
        return new self(self::WEDNESDAY);
    }

    public static function thursday(): self
    {
        return new self(self::THURSDAY);
    }

    public static function friday(): self
    {
        return new self(self::FRIDAY);
    }

    public static function saturday(): self
    {
        return new self(self::SATURDAY);
    }

    public static function sunday(): self
    {
        return new self(self::SUNDAY);
    }
}
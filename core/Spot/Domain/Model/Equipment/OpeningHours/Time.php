<?php
declare(strict_types=1);

namespace Core\Spot\Domain\Model\Equipment\OpeningHours;


use Core\Spot\Domain\Exception\InvalidTimeException;

class Time
{
    private const HOUR_MIN_VALUE = 0;
    private const HOUR_MAX_VALUE = 23;
    private const MINUTE_MIN_VALUE = 0;
    private const MINUTE_MAX_VALUE = 59;
    /**
     * @var int
     */
    private $hour;
    /**
     * @var int
     */
    private $minute;

    public function __construct(int $hour, int $minute)
    {
        if ($hour < self::HOUR_MIN_VALUE || $hour > self::HOUR_MAX_VALUE) {
            throw new InvalidTimeException();
        }

        if ($minute < self::MINUTE_MIN_VALUE || $minute > self::MINUTE_MAX_VALUE) {
            throw new InvalidTimeException();
        }

        $this->hour = $hour;
        $this->minute = $minute;
    }

    public function hour(): int
    {
        return $this->hour;
    }

    public function minute(): int
    {
        return $this->minute;
    }
}
<?php
declare(strict_types=1);

namespace Core\Spot\Domain\Model\Equipment;


use Core\Spot\Domain\Model\Equipment\OpeningHours\DayOfTheWeek;
use Core\Spot\Domain\Model\Equipment\OpeningHours\Time;

class OpeningHours
{
    /**
     * @var DayOfTheWeek
     */
    private $dayOfTheWeek;
    /**
     * @var Time
     */
    private $from;
    /**
     * @var Time
     */
    private $to;

    public function __construct(DayOfTheWeek $dayOfTheWeek, Time $from, Time $to)
    {
        $this->dayOfTheWeek = $dayOfTheWeek;
        $this->from = $from;
        $this->to = $to;
    }

    public function dayOfTheWeek(): DayOfTheWeek
    {
        return $this->dayOfTheWeek;
    }

    public function from(): Time
    {
        return $this->from;
    }

    public function to(): Time
    {
        return $this->to;
    }
}
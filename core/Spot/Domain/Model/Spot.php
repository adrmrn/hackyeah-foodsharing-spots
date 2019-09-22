<?php
declare(strict_types=1);

namespace Core\Spot\Domain\Model;


use Core\Spot\Domain\Model\Spot\Description;
use Core\Spot\Domain\Model\Spot\Localization;
use Core\Spot\Domain\Model\Spot\Name;
use Core\Spot\Domain\Model\Spot\SpotId;

class Spot
{
    /**
     * @var SpotId
     */
    private $id;
    /**
     * @var Name
     */
    private $name;
    /**
     * @var Localization
     */
    private $localization;
    /**
     * @var bool
     */
    private $isOpenRoundTheClock;
    /**
     * @var Description|null
     */
    private $description;

    public function __construct(
        SpotId $id,
        Name $name,
        Localization $localization,
        bool $isOpenRoundTheClock,
        ?Description $description = null
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->localization = $localization;
        $this->isOpenRoundTheClock = $isOpenRoundTheClock;
        $this->description = $description;
    }

    public function id(): SpotId
    {
        return $this->id;
    }

    public function name(): Name
    {
        return $this->name;
    }

    public function localization(): Localization
    {
        return $this->localization;
    }

    public function isOpenRoundTheClock(): bool
    {
        return $this->isOpenRoundTheClock;
    }

    public function description(): ?Description
    {
        return $this->description;
    }

    public function hasDescription(): bool
    {
        return !is_null($this->description);
    }
}
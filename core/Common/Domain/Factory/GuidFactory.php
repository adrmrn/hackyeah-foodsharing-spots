<?php
declare(strict_types=1);

namespace Core\Common\Domain\Factory;


use Core\Common\Domain\Model\Guid;

interface GuidFactory
{
    public function generate(): Guid;
}
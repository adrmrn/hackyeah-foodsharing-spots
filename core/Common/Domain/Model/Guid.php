<?php
declare(strict_types=1);

namespace Core\Common\Domain\Model;

interface Guid
{
    public function toString(): string;
}
<?php
declare(strict_types=1);

namespace Core\Common\Application;


interface ReadModel
{
    public function toArray(): array;
}
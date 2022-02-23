<?php

declare(strict_types=1);

namespace App\Traits;

trait TimestampableTrait
{
    use CreatedOnTrait;
    use UpdatedOnTrait;
}

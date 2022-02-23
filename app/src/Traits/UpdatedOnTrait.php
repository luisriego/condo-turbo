<?php

declare(strict_types=1);

namespace App\Traits;

trait UpdatedOnTrait
{
    protected \DateTime $updatedOn;

    public function getUpdatedOn(): \DateTime
    {
        return $this->updatedOn;
    }

    public function markAsUpdated(): void
    {
        $this->updatedOn = new \DateTime();
    }
}

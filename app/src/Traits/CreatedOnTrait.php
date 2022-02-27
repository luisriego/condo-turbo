<?php

declare(strict_types=1);

namespace App\Traits;

trait CreatedOnTrait
{
    #[ORM\Column(type: 'datetime')]
    protected \DateTime $createdOn;

    public function getCreatedOn(): \Datetime
    {
        return $this->createdOn;
    }
}

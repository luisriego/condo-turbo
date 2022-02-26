<?php

declare(strict_types=1);

namespace App\Traits;

use Doctrine\ORM\Mapping as ORM;

trait IdentifierTrait
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    #[ORM\Column(type: 'string', columnDefinition: 'CHAR(36) NOT NULL')]
    protected string $id;

    public function getId(): string
    {
        return $this->id;
    }
}

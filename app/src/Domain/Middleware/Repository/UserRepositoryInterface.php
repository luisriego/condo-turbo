<?php

declare(strict_types=1);

namespace App\Domain\Middleware\Repository;

interface UserRepositoryInterface
{
    public function save(object $entity): void;
}
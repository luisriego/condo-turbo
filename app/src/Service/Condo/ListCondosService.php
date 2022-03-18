<?php

declare(strict_types=1);

namespace App\Service\Condo;

use App\Entity\Condo;
use App\Entity\User;
use App\Exception\Condo\CondoNotFoundException;
use App\Repository\CondoRepository;

class ListCondosService
{
    public function __construct(private CondoRepository $condoRepository)
    {
    }

    public function __invoke(): array|Condo
    {
        if (null === $condo = $this->condoRepository->findAll()) {
            throw CondoNotFoundException::noOne();
        }

//        if (!$condo->containsUser($user)) {
//            throw new UserHasNotAuthorizationException();
//        }

        return $condo;
    }
}
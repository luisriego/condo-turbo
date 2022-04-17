<?php

namespace App\Entity;

use App\Repository\CondoRepository;
use App\Traits\IdentifierTrait;
use App\Traits\IsActiveTrait;
use App\Traits\TimestampableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: CondoRepository::class)]
class Condo
{
    use IdentifierTrait, IsActiveTrait, TimestampableTrait;

    #[ORM\Column(type: 'string', length: 14)]
    private ?string $cnpj = '';

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private ?string $fantasyName = '';

    #[ORM\OneToMany(mappedBy: 'condo', targetEntity: User::class, orphanRemoval: true)]
    private $users;

    public function __construct()
    {
        $this->id = Uuid::v4()->toRfc4122();
        $this->users = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->fantasyName;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getCnpj(): ?string
    {
        return $this->cnpj;
    }

    public function setCnpj(string $cnpj): self
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    public function getFantasyName(): ?string
    {
        return $this->fantasyName;
    }

    public function setFantasyName(?string $fantasyName): self
    {
        $this->fantasyName = $fantasyName;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setCondo($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getCondo() === $this) {
                $user->setCondo(null);
            }
        }

        return $this;
    }


    #[Pure]
    public function containsUser(User $user): bool
    {
        return $this->users->contains($user);
    }
}

<?php

namespace App\Entity;

use App\Repository\CondoRepository;
use App\Traits\IdentifierTrait;
use App\Traits\IsActiveTrait;
use App\Traits\TimestampableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: CondoRepository::class)]
class Condo
{
    use IdentifierTrait, IsActiveTrait, TimestampableTrait;

    #[ORM\Column(type: 'string', length: 14)]
    private ?string $cnpj = '';

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private ?string $fantasyName = '';

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'condos')]
    private $users;

    public function __construct()
    {
        $this->id = Uuid::v4()->toRfc4122();
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
    public function getUsers(): Collection|null
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addCondo($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeCondo($this);
        }

        return $this;
    }
}

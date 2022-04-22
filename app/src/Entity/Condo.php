<?php

namespace App\Entity;

use App\Repository\CondoRepository;
use App\Traits\IdentifierTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: CondoRepository::class)]
class Condo
{
    use IdentifierTrait;

    #[ORM\Column(type: 'string', length: 14)]
    private ?string $cnpj = '';

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private ?string $fantasyName = '';

    #[ORM\Column(type: 'boolean')]
    protected bool $isActive = false;

    #[ORM\Column(type: 'datetime')]
    protected \DateTime $createdOn;

    #[ORM\Column(type: 'datetime')]
    protected \DateTime $updatedOn;

    #[ORM\OneToMany(mappedBy: 'condo', targetEntity: User::class, orphanRemoval: true)]
    private $users;

    #[ORM\OneToMany(mappedBy: 'condo', targetEntity: Entry::class, orphanRemoval: true)]
    private $entries;

    public function __construct()
    {
        $this->id = Uuid::v4()->toRfc4122();
        $this->users = new ArrayCollection();
        $this->entries = new ArrayCollection();
        $this->createdOn = new \DateTime();
        $this->markAsUpdated();
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

    /**
     * @return Collection<int, Entry>
     */
    public function getEntries(): Collection
    {
        return $this->entries;
    }

    public function addEntry(Entry $entry): self
    {
        if (!$this->entries->contains($entry)) {
            $this->entries[] = $entry;
            $entry->setCondo($this);
        }

        return $this;
    }

    public function removeEntry(Entry $entry): self
    {
        if ($this->entries->removeElement($entry)) {
            // set the owning side to null (unless already changed)
            if ($entry->getCondo() === $this) {
                $entry->setCondo(null);
            }
        }

        return $this;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }

    public function toggleActive(): void
    {
        $this->isActive = !$this->isActive;
    }

    public function getCreatedOn(): \DateTime
    {
        return $this->createdOn;
    }

    public function getUpdatedOn(): \DateTime
    {
        return $this->updatedOn;
    }

    public function markAsUpdated(): void
    {
        $this->updatedOn = new \DateTime();
    }
}

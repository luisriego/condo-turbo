<?php

namespace App\Entity;

use App\Repository\EntryRepository;
use App\Traits\IdentifierTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: EntryRepository::class)]
class Entry
{
    use IdentifierTrait;

    #[ORM\Column(type: 'string', length: 50)]
    private string $name;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description;

    #[ORM\Column(type: 'integer')]
    private int $valueCents = 0;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTime $due;

    #[ORM\Column(type: 'smallint')]
    private int $state = 0;

    #[ORM\Column(type: 'datetime')]
    protected \DateTime $createdOn;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'entries')]
    #[ORM\JoinColumn(nullable: false)]
    private User $user;

    #[ORM\ManyToOne(targetEntity: Condo::class, inversedBy: 'entries')]
    #[ORM\JoinColumn(nullable: false)]
    private Condo $condo;

    public function __construct()
    {
        $this->id = Uuid::v4()->toRfc4122();
        $this->createdOn = new \DateTime();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getValueCents(): ?int
    {
        return $this->valueCents;
    }

    public function setValueCents(int $valueCents): self
    {
        $this->valueCents = $valueCents;

        return $this;
    }

    public function getDue(): ?\DateTimeInterface
    {
        return $this->due;
    }

    public function setDue(?\DateTimeInterface $due): self
    {
        $this->due = $due;

        return $this;
    }

    public function getCreatedOn(): ?\DateTimeInterface
    {
        return $this->createdOn;
    }

    public function getState(): ?int
    {
        return $this->state;
    }

    public function setState(int $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCondo(): ?Condo
    {
        return $this->condo;
    }

    public function setCondo(?Condo $condo): self
    {
        $this->condo = $condo;

        return $this;
    }
}

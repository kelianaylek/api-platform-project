<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PublicHolidaysRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PublicHolidaysRepository::class)]
#[ApiResource]
class PublicHolidays
{

    public function __toString(): string
    {
        return $this->name;
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable:true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $localName = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $name = null;

    #[ORM\OneToOne(inversedBy: 'publicHolidays', cascade: ['persist', 'remove'])]
    private ?Country $Country = null;

    #[ORM\Column(nullable:true)]
    private ?bool $fixed = null;

    #[ORM\Column(nullable:true)]
    private ?bool $global = null;

    #[ORM\Column(nullable:true)]
    private ?int $launchYear = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getLocalName(): ?string
    {
        return $this->localName;
    }

    public function setLocalName(?string $localName): self
    {
        $this->localName = $localName;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->Country;
    }

    public function setCountry(?Country $Country): self
    {
        $this->Country = $Country;

        return $this;
    }

    public function isFixed(): ?bool
    {
        return $this->fixed;
    }

    public function setFixed(?bool $fixed): self
    {
        $this->fixed = $fixed;

        return $this;
    }

    public function isGlobal(): ?bool
    {
        return $this->global;
    }

    public function setGlobal(?bool $global): self
    {
        $this->global = $global;

        return $this;
    }

    public function getLaunchYear(): ?int
    {
        return $this->launchYear;
    }

    public function setLaunchYear(?int $launchYear): self
    {
        $this->launchYear = $launchYear;

        return $this;
    }
}

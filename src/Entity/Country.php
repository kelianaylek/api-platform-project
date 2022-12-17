<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CountryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountryRepository::class)]
#[ApiResource]
class Country
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $countryCode = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $region = null;

    #[ORM\Column(length: 255)]
    private ?string $officialName = null;

    #[ORM\OneToOne(mappedBy: 'Country', cascade: ['persist', 'remove'])]
    private ?PublicHolidays $publicHolidays = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): self
    {
        $this->countryCode = $countryCode;

        return $this;
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

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getOfficialName(): ?string
    {
        return $this->officialName;
    }

    public function setOfficialName(string $officialName): self
    {
        $this->officialName = $officialName;

        return $this;
    }

    public function getPublicHolidays(): ?PublicHolidays
    {
        return $this->publicHolidays;
    }

    public function setPublicHolidays(?PublicHolidays $publicHolidays): self
    {
        // unset the owning side of the relation if necessary
        if ($publicHolidays === null && $this->publicHolidays !== null) {
            $this->publicHolidays->setCountry(null);
        }

        // set the owning side of the relation if necessary
        if ($publicHolidays !== null && $publicHolidays->getCountry() !== $this) {
            $publicHolidays->setCountry($this);
        }

        $this->publicHolidays = $publicHolidays;

        return $this;
    }
}

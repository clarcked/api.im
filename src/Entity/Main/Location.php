<?php

namespace App\Entity\Main;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\BaseEntity;
use App\Repository\Main\LocationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=LocationRepository::class)
 */
class Location extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array")
     */
    private $latLng = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $bounds = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $zipcode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLatLng(): ?array
    {
        return $this->latLng;
    }

    public function setLatLng(array $latLng): self
    {
        $this->latLng = $latLng;

        return $this;
    }

    public function getBounds(): ?array
    {
        return $this->bounds;
    }

    public function setBounds(?array $bounds): self
    {
        $this->bounds = $bounds;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(?string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }
}

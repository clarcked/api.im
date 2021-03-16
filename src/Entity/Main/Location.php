<?php

namespace App\Entity\Main;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\BaseEntity;
use App\Repository\Main\LocationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass=LocationRepository::class)
 */
class Location extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"write"})
     */
    private $id;

    /**
     * @ORM\Column(type="array")
     * @Groups({"write"})
     */
    private $latLng = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     * @Groups({"write"})
     */
    private $bounds = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"write"})
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

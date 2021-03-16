<?php

namespace App\Entity\Commerce;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\BaseProject;
use App\Repository\Commerce\ShippingRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass=ShippingRepository::class)
 */
class Shipping extends BaseProject
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"write"})
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     * @Groups({"write"})
     */
    private $cost;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"write"})
     */
    private $additional;

    /**
     * @ORM\Column(type="array", nullable=true)
     * @Groups({"write"})
     */
    private $conditions = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCost(): ?float
    {
        return $this->cost;
    }

    public function setCost(float $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function getAdditional(): ?float
    {
        return $this->additional;
    }

    public function setAdditional(?float $additional): self
    {
        $this->additional = $additional;

        return $this;
    }

    public function getConditions(): ?array
    {
        return $this->conditions;
    }

    public function setConditions(?array $conditions): self
    {
        $this->conditions = $conditions;

        return $this;
    }
}

<?php

namespace App\Entity\Commerce;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\BaseProject;
use App\Repository\Commerce\OrderRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`Order`")
 */
class Order extends BaseProject
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
    private $quantity;

    /**
     * @ORM\OneToOne(targetEntity=Stock::class, cascade={"persist", "remove"})
     * @Groups({"write"})
     */
    private $stock;

    /**
     * @ORM\ManyToOne(targetEntity=Sale::class, inversedBy="orders")
     * @Groups({"write"})
     */
    private $sale;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getStock(): ?Stock
    {
        return $this->stock;
    }

    public function setStock(?Stock $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getSale(): ?Sale
    {
        return $this->sale;
    }

    public function setSale(?Sale $sale): self
    {
        $this->sale = $sale;

        return $this;
    }
}

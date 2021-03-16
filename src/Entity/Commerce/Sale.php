<?php

namespace App\Entity\Commerce;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\BaseProject;
use App\Repository\Commerce\SaleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass=SaleRepository::class)
 */
class Sale extends BaseProject
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"write"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"write"})
     */
    private $customer;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({"write"})
     */
    private $isForDelivery;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"write"})
     */
    private $location;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"write"})
     */
    private $payment;

    /**
     * @ORM\OneToMany(targetEntity=Order::class, mappedBy="sale")
     * @Groups({"write"})
     */
    private $orders;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomer(): ?string
    {
        return $this->customer;
    }

    public function setCustomer(string $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getIsForDelivery(): ?bool
    {
        return $this->isForDelivery;
    }

    public function setIsForDelivery(?bool $isForDelivery): self
    {
        $this->isForDelivery = $isForDelivery;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getPayment(): ?string
    {
        return $this->payment;
    }

    public function setPayment(?string $payment): self
    {
        $this->payment = $payment;

        return $this;
    }

    /**
     * @return Collection|Order[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->setSale($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->orders->removeElement($order)) {
            // set the owning side to null (unless already changed)
            if ($order->getSale() === $this) {
                $order->setSale(null);
            }
        }

        return $this;
    }
}

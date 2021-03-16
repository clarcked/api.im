<?php

namespace App\Entity\Commerce;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\BaseProject;
use App\Repository\Commerce\StockRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass=StockRepository::class)
 */
class Stock extends BaseProject
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"write"})
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"write"})
     */
    private $dateOfStockage;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"write"})
     */
    private $dateOfShipping;

    /**
     * @ORM\ManyToOne(targetEntity=Provider::class, inversedBy="stocks")
     * @Groups({"write"})
     */
    private $provider;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"write"})
     */
    private $receipt;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"write"})
     */
    private $cost;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"write"})
     */
    private $price;

    /**
     * @ORM\Column(type="float")
     * @Groups({"write"})
     */
    private $quantity;

    /**
     * @ORM\OneToOne(targetEntity=Shipping::class, cascade={"persist", "remove"})
     * @Groups({"write"})
     */
    private $shipping;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"write"})
     */
    private $tax;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"write"})
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"write"})
     */
    private $seo;

    /**
     * @ORM\OneToOne(targetEntity=Product::class, mappedBy="stock", cascade={"persist", "remove"})
     * @Groups({"write"})
     */
    private $product;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateOfStockage(): ?\DateTimeInterface
    {
        return $this->dateOfStockage;
    }

    public function setDateOfStockage(\DateTimeInterface $dateOfStockage): self
    {
        $this->dateOfStockage = $dateOfStockage;

        return $this;
    }

    public function getDateOfShipping(): ?\DateTimeInterface
    {
        return $this->dateOfShipping;
    }

    public function setDateOfShipping(\DateTimeInterface $dateOfShipping): self
    {
        $this->dateOfShipping = $dateOfShipping;

        return $this;
    }

    public function getProvider(): ?Provider
    {
        return $this->provider;
    }

    public function setProvider(?Provider $provider): self
    {
        $this->provider = $provider;

        return $this;
    }

    public function getReceipt(): ?string
    {
        return $this->receipt;
    }

    public function setReceipt(?string $receipt): self
    {
        $this->receipt = $receipt;

        return $this;
    }

    public function getCost(): ?float
    {
        return $this->cost;
    }

    public function setCost(?float $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
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

    public function getShipping(): ?Shipping
    {
        return $this->shipping;
    }

    public function setShipping(?Shipping $shipping): self
    {
        $this->shipping = $shipping;

        return $this;
    }

    public function getTax(): ?float
    {
        return $this->tax;
    }

    public function setTax(?float $tax): self
    {
        $this->tax = $tax;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getSeo(): ?string
    {
        return $this->seo;
    }

    public function setSeo(?string $seo): self
    {
        $this->seo = $seo;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        // unset the owning side of the relation if necessary
        if ($product === null && $this->product !== null) {
            $this->product->setStock(null);
        }

        // set the owning side of the relation if necessary
        if ($product !== null && $product->getStock() !== $this) {
            $product->setStock($this);
        }

        $this->product = $product;

        return $this;
    }
}

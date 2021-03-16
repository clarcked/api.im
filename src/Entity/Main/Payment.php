<?php

namespace App\Entity\Main;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\BaseEntity;
use App\Repository\Main\PaymentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass=PaymentRepository::class)
 */
class Payment extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"write"})
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=PaymentMethod::class, cascade={"persist", "remove"})
     * @Groups({"write"})
     */
    private $method;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"write"})
     */
    private $ref;

    /**
     * @ORM\Column(type="float")
     * @Groups({"write"})
     */
    private $amount;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMethod(): ?PaymentMethod
    {
        return $this->method;
    }

    public function setMethod(?PaymentMethod $method): self
    {
        $this->method = $method;

        return $this;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }
}

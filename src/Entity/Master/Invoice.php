<?php

namespace App\Entity\Master;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\BaseEntity;
use App\Repository\Master\InvoiceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass=InvoiceRepository::class)
 */
class Invoice extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"write"})
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Project::class, cascade={"persist", "remove"})
     * @Groups({"write"})
     */
    private $project;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"write"})
     */
    private $startPeriod;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"write"})
     */
    private $endPeriod;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;

        return $this;
    }

    public function getStartPeriod(): ?\DateTimeInterface
    {
        return $this->startPeriod;
    }

    public function setStartPeriod(\DateTimeInterface $startPeriod): self
    {
        $this->startPeriod = $startPeriod;

        return $this;
    }

    public function getEndPeriod(): ?\DateTimeInterface
    {
        return $this->endPeriod;
    }

    public function setEndPeriod(\DateTimeInterface $endPeriod): self
    {
        $this->endPeriod = $endPeriod;

        return $this;
    }
}

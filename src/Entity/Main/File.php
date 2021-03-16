<?php

namespace App\Entity\Main;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\BaseEntity;
use App\Repository\Main\FileRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass=FileRepository::class)
 */
class File extends BaseEntity
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
    private $dir;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"write"})
     */
    private $host;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"write"})
     */
    private $filename;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"write"})
     */
    private $type;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"write"})
     */
    private $size;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDir(): ?string
    {
        return $this->dir;
    }

    public function setDir(string $dir): self
    {
        $this->dir = $dir;

        return $this;
    }

    public function getHost(): ?string
    {
        return $this->host;
    }

    public function setHost(string $host): self
    {
        $this->host = $host;

        return $this;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSize(): ?float
    {
        return $this->size;
    }

    public function setSize(?float $size): self
    {
        $this->size = $size;

        return $this;
    }
}

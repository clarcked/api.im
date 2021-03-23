<?php


namespace App\Entity;


use App\Interfaces\EntityInterface;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

abstract class BaseEntity implements EntityInterface
{
    /**
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $modifiedAt;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"write"})
     */
    protected $status;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"write"})
     */
    protected $note;

    /**
     * @return DateTimeInterface
     */
    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param DateTimeInterface|null $createdAt
     * @return BaseEntity
     */
    public function setCreatedAt(?DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getModifiedAt(): DateTimeInterface
    {
        return $this->modifiedAt;
    }

    /**
     * @param DateTimeInterface|null $modifiedAt
     * @return BaseEntity
     */
    public function setModifiedAt(?DateTimeInterface $modifiedAt): self
    {
        $this->modifiedAt = $modifiedAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     * @return BaseEntity
     */
    public function setStatus(?string $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string $note
     * @return BaseEntity
     */
    public function setNote(?string $note): self
    {
        $this->note = $note;
        return $this;
    }
}
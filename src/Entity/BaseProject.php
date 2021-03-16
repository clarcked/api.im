<?php


namespace App\Entity;


use App\Interfaces\ProjectInterface;
use Doctrine\ORM\Mapping as ORM;

abstract class BaseProject extends BaseEntity implements ProjectInterface
{
    /**
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    protected string $project;

    public function getProject(): string
    {
        return $this->project;
    }

    public function setProject(string $project): self
    {
        $this->project = $project;
        return $this;
    }
}
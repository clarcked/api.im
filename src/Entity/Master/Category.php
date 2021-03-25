<?php

namespace App\Entity\Master;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\BaseEntity;
use App\Repository\Master\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category extends BaseEntity
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Project::class, mappedBy="category")
     * @Groups({"write"})
     */
    private $projects;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Project $project): self
    {
        if (!$this->projects->contains($project)) {
            $this->projects[] = $project;
            $project->setCategory($this);
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->projects->removeElement($project)) {
            // set the owning side to null (unless already changed)
            if ($project->getCategory() === $this) {
                $project->setCategory(null);
            }
        }

        return $this;
    }
}

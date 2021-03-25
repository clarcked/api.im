<?php

namespace App\Entity\Master;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\BaseEntity;
use App\Repository\Master\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project extends BaseEntity
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
     * @ORM\Column(type="string", length=255)
     * @Groups({"write"})
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="projects", cascade={"persist"})
     * @Groups({"write"})
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity=Collaborator::class, inversedBy="projects", cascade={"persist"})
     * @Groups({"write"})
     */
    private $collabs;

    /**
     * @ORM\ManyToOne(targetEntity=Host::class, inversedBy="projects", cascade={"persist"})
     * @Groups({"write"})
     */
    private $host;

    /**
     * @ORM\ManyToMany(targetEntity=Feature::class, inversedBy="projects", cascade={"persist"})
     * @Groups({"write"})
     */
    private $features;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"write"})
     */
    private $picture;

    public function __construct()
    {
        $this->collabs = new ArrayCollection();
        $this->features = new ArrayCollection();
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

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Collaborator[]
     */
    public function getCollabs(): Collection
    {
        return $this->collabs;
    }

    public function addCollab(Collaborator $collab): self
    {
        if (!$this->collabs->contains($collab)) {
            $this->collabs[] = $collab;
        }

        return $this;
    }

    public function removeCollab(Collaborator $collab): self
    {
        $this->collabs->removeElement($collab);

        return $this;
    }

    public function getHost(): ?Host
    {
        return $this->host;
    }

    public function setHost(?Host $host): self
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @return Collection|Feature[]
     */
    public function getFeatures(): Collection
    {
        return $this->features;
    }

    public function addFeature(Feature $feature): self
    {
        if (!$this->features->contains($feature)) {
            $this->features[] = $feature;
        }

        return $this;
    }

    public function removeFeature(Feature $feature): self
    {
        $this->features->removeElement($feature);

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
}

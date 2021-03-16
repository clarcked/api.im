<?php

namespace App\Entity\Main;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\BaseEntity;
use App\Repository\Main\SettingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=SettingRepository::class)
 */
class Setting extends BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Seo::class, cascade={"persist", "remove"})
     */
    private $seo;

    /**
     * @ORM\OneToOne(targetEntity=Location::class, cascade={"persist", "remove"})
     */
    private $location;

    /**
     * @ORM\OneToOne(targetEntity=Schedule::class, cascade={"persist", "remove"})
     */
    private $schedule;

    /**
     * @ORM\OneToOne(targetEntity=Location::class, cascade={"persist", "remove"})
     */
    private $area;

    /**
     * @ORM\OneToOne(targetEntity=File::class, cascade={"persist", "remove"})
     */
    private $picture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSeo(): ?Seo
    {
        return $this->seo;
    }

    public function setSeo(?Seo $seo): self
    {
        $this->seo = $seo;

        return $this;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getSchedule(): ?Schedule
    {
        return $this->schedule;
    }

    public function setSchedule(?Schedule $schedule): self
    {
        $this->schedule = $schedule;

        return $this;
    }

    public function getArea(): ?Location
    {
        return $this->area;
    }

    public function setArea(?Location $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getPicture(): ?File
    {
        return $this->picture;
    }

    public function setPicture(?File $picture): self
    {
        $this->picture = $picture;

        return $this;
    }
}

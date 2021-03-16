<?php

namespace App\Entity\Main;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\BaseUser;
use App\Repository\Main\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`User`")
 */
class User extends BaseUser
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
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"write"})
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"write"})
     */
    private $password;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"write"})
     */
    private $apiKey;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"write"})
     */
    private $publicKey;

    /**
     * @ORM\Column(type="array")
     * @Groups({"write"})
     */
    private $roles = [];

    /**
     * @ORM\OneToOne(targetEntity=Profile::class, cascade={"persist", "remove"})
     * @Groups({"write"})
     */
    private $profile;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getApiKey(): ?string
    {
        return $this->apiKey;
    }

    public function setApiKey(?string $apiKey): self
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    public function getPublicKey(): ?string
    {
        return $this->publicKey;
    }

    public function setPublicKey(?string $publicKey): self
    {
        $this->publicKey = $publicKey;

        return $this;
    }

    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getProfile(): ?Profile
    {
        return $this->profile;
    }

    public function setProfile(?Profile $profile): self
    {
        $this->profile = $profile;

        return $this;
    }
}

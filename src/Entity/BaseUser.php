<?php


namespace App\Entity;


use App\Interfaces\UserInterface;
use Doctrine\ORM\Mapping as ORM;

abstract class BaseUser extends BaseEntity implements UserInterface
{
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    protected string $salt;

    /**
     * @return string
     */
    public function getSalt(): string
    {
        return $this->salt;
    }

    /**
     * @param string $salt
     */
    public function setSalt(string $salt): self
    {
        $this->salt = $salt;
        return $this;
    }

    public function eraseCredentials()
    {
    }

}
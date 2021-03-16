<?php


namespace App\Interfaces;


use Symfony\Component\Security\Core\User\UserInterface as UInterface;

interface UserInterface extends UInterface, EntityInterface
{

    function getUsername(): ?string;

    function setUsername(string $arg);

    function getEmail(): ?string;

    function setEmail(string $arg);

    function getPassword(): ?string;

    function setPassword(string $arg);

    function getApiKey(): ?string;

    function setApiKey(string $arg);

    function getPublicKey(): ?string;

    function setPublicKey(string $arg);

    function getRoles(): ?array;

    function setRoles(array $arg);

}
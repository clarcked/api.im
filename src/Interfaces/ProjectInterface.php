<?php


namespace App\Interfaces;


interface ProjectInterface extends EntityInterface
{
    function getProject(): ?string;

    function setProject(?string $project);
}
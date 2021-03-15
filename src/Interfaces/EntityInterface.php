<?php


namespace App\Interfaces;


interface EntityInterface
{

    function getCreatedAt(): \DateTimeInterface;

    function setCreatedAt(\DateTimeInterface $arg);

    function getModifiedAt(): \DateTimeInterface;

    function setModifiedAt(\DateTimeInterface $arg);

    function getStatus(): string;

    function setStatus(string $arg);

    function getNote(): string;

    function setNote(string $arg);

}
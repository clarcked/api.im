<?php


namespace App\Interfaces;


interface ProjectInterface extends EntityInterface
{
    function getProject();

    function setProject($project);
}
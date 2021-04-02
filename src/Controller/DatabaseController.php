<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class DatabaseController extends AbstractController
{
    public function index(): JsonResponse
    {
        return $this->json("data base operation api");
    }

    public function create(): JsonResponse
    {
        return $this->json("database created");
    }

    public function update(): JsonResponse
    {
        return $this->json("database updated");
    }
}
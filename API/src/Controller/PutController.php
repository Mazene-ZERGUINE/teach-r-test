<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class PutController extends AbstractController
{
    #[Route('/put', name: 'app_put' , methods:['PUT' , 'PATCH'])]
    public function index(): JsonResponse
    {
     
    }
}

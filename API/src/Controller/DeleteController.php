<?php

// bonus delete request wish it gives me somme credit points ^^  //

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DeleteController extends AbstractController
{
    #[Route('/delete/{id}', name: 'app_delete' , methods:'DELETE')]
    public function index($id): JsonResponse
    {
      
    }
}

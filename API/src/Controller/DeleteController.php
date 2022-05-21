<?php

// bonus delete request wish it gives me somme credit points ^^  //

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Teachr;
use App\Entity\Statics;

class DeleteController extends AbstractController
{
    #[Route('/delete/{id}', name: 'app_delete' , methods:'DELETE')]
    public function index(ManagerRegistry $doctrine,  $id): JsonResponse
    {

        // request status code 
        $statusCode = 200 ; 

        // headers 

        $headers = [
            "Content-Type" => "application/json",
        ];


        // we fetch the user selected in the url 

        $teachr = $doctrine->getRepository(Teachr::class)->find($id);

        if (!$teachr) 
        {
            return $this->json([404 , $headers , ["success" => false , "data" => "object not fount"]]) ; 
            die() ;
        }

        $entityManager = $doctrine->getManager();

        $entityManager->remove($teachr) ;
        
        $entityManager->flush() ;

        return $this->json([$statusCode , $headers , ["success" => true , "message" => "object successfuly deleted from database"]]) ; 


    }
}

<?php




namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GetController extends AbstractController
{
    #[Route('/get/{id}', name: 'app_get' , defaults:['id' => null] , methods:'GET')]
    public function index($id): JsonResponse
    {
        // returns all teach'r object within the database 

        if ($id === null) 
        {
            return $this->json("nice") ;
            die() ; 
        }

        else

        // return a specific object selected by the user 
        {
            return $this->json($id);
            die() ; 
        }
    
        
    }
}

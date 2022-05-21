<?php




namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Teachr;
use Symfony\Component\HttpFoundation\Response;


class GetController extends AbstractController
{
    #[Route('/get/{id}', name: 'app_get' , defaults:['id' => null] , methods:'GET')]
    public function index(ManagerRegistry $doctrine,  $id): JsonResponse
    {
        // returns all teach'r object within the database 

        if ($id === null) 
        {
           // request status code 
            $statusCode = 200 ; 

            // headers 

            $headers = [
                "Content-Type" => "application/json",
            ];

            
            // we fetch all data from database //

            $teachrs = $doctrine->getRepository(Teachr::class)->findAll();

            // we create a new array to contain the data we fetched from the database
            $data = array() ; 


            for ($i = 0 ; $i < count($teachrs) ; $i++) 
            {
                $data[$i] = [
                    "id" => $teachrs[$i]->getId() ,
                    "prenom" => $teachrs[$i]->getPrenom() ,
                    "creation" => $teachrs[$i]->getCreation() 
                ] ; 
            }

            // we send the response to the user 
            return $this->json([$statusCode , $headers , ["success" => true , "data" => $data]]) ; 
            
            

        }

        else

        // return a specific object selected by the user 
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

           return $this->json([$statusCode , $headers , ["success" => true , "data" => ["id" => $teachr->getId() , "prenom" => $teachr->getPrenom() , "creation" => $teachr->getCreation()]]]) ;
           
        }
    
        
    }
}

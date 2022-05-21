<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Teachr;
use Symfony\Component\HttpFoundation\Response;

class PutController extends AbstractController
{
    #[Route('/put/{id}', name: 'app_put' , methods:['PUT' , 'PATCH'])]
    public function index(ManagerRegistry $doctrine,  $id): JsonResponse
    {
        
        // we read the data sent by the user then decode them from json format //

        $data = json_decode(file_get_contents("php://input"));

        // status code for the request in case of success //

        $statusCode = 200 ; 

        // json application //

        $headers = [
            "Content-Type" => "application/json",
        ];

        // we check the fildes of inputs //
        if (!property_exists($data, "prenom")) {

            return $this->json([ 400, ["success" => false , "error" => "property name is mandatory"]]) ;
            die() ; 
        }
        if (!property_exists($data, "creation")) {

           return $this->json([400 , $headers , ["success" => false , "error" => "property name is mandatory"]]) ;
            die() ; 
        }

        // we check input values //

        if (!is_string($data->prenom)) 
        {
            return $this->json([400 , $headers , ["success" => false , "error" => "bad input"]]) ;
            die() ; 
        }

        if (!preg_match("^\\d{1,2}/\\d{2}/\\d{4}^", $data->creation))
         {
            return $this->json([400 , $headers , ["success" => false , "error" => "bad input"]]) ;
            die() ; 
         }

         // we check if the object exist 
         $teachr = $doctrine->getRepository(Teachr::class)->find($id);

         if (!$teachr) 
         {
             return $this->json([404 , $headers , ["success" => false , "data" => "object not fount"]]) ; 
             die() ;
         }

         // we update the object 

         $entityManager = $doctrine->getManager();


         $teachr->setPrenom($data->prenom) ; 

         $teachr->setCreation($data->creation) ; 

         $entityManager->flush() ;

         // we return a confirmation message to the user 

         return $this->json([$statusCode , $headers , ["success" => true , "message" => "object successfuly updated"]]) ; 

    }
}

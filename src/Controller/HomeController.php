<?php
// Controller Homepage
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('index', name: 'Homepage')]

    public function index(): Response
    {
        return $this->render('index.html.twig');
    }
    
    /*
    #[Route('/experience/{id}', name: 'Homepage')]
    public function experience($id){

        return $this->render('experience.html.twig', [
            "id" => $id    ]);
    }*/

}
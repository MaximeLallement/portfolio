<?php

namespace App\Controller;

use App\Entity\Experience;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExperienceController extends AbstractController
{
    #[Route('/experience', name: 'app_experience')]
    public function index(): Response
    {
        return $this->render('experience/index.html.twig', [
            'controller_name' => 'ExperienceController',
        ]);
    }

    #[Route('/add_experience', name: 'add_experience')]
    public function createExperience(ManagerRegistry $doctrine): Response
    {
        
        $entityManager = $doctrine->getManager();

        $product = new Experience();
            
        $product->setDescription('Stage de BTS 2eme Année');
        $product->setDateDebut(new DateTime('2022-01-03 00:00:00'));
        $product->setDateFin(new DateTime('2022-02-10 00:00:00'));

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$product->getId());
    }
}

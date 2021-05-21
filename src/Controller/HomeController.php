<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\VenteRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    #[Route('/', name: 'home', methods: ['GET'])]
    public function index(VenteRepository $venteRepository): Response
    {

        $ventes = $venteRepository->VenteActuelle();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'ventes' => $ventes,

        ]);
    }
}

<?php

namespace App\Controller;

use App\Repository\HomeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(HomeRepository $homeRepository): Response
    {
        // Puisqu'il y a injection de dépendance en utilise l'objet représenté
        // par la variable $homeRepository pour aller chercher des données dans la BDD
        $home = $homeRepository->findOneBy([ 'isActive' => true]);
        // on fait une die and dump pour voir ce que l'on récupère 
        // dd($home);
        // on déclenche le rendu de la vue associé à la route (index.html.twig du dossier home)
        // et on pase.

        return $this->render('home/index.html.twig', [
            'laHome' => $home,
        ]);
    }
}


<?php

namespace App\Controller;

use App\Repository\BoutiqueRepository;
use App\Repository\ProduitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    // #[Route('/', name: 'app_home')]
    // public function index(ProduitsRepository $produitsRepo): Response
    // {
    //     //$produits = $produitsRepo->findAll();
    //     //dd($produits);
    //     return $this->render('home/home.html.twig');
    // }

    // Renvois les boutiques pour afficher les logos dans la bannière et les produits bon plans
    #[Route('/', name: 'app_home')]
    public function bannieres(BoutiqueRepository $boutiqueRepo): Response
    {   
        $boutiques = $boutiqueRepo-> findBy([], ['id' => 'DESC']);    

        return $this->render('home/home.html.twig', ['boutiques' => $boutiques]);
    }

}

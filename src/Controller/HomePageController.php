<?php

namespace App\Controller;
use App\Repository\ProduitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ProduitsRepository $produitsRepo): Response
    {
        //$produits = $produitsRepo->findAll();
        //dd($produits);
        return $this->render('home/home.html.twig');
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    #[Route('/produit/bonplans', name: 'app_produit_bonplans')]
    public function index(): Response
    {
        return $this->render('produit/bonplans.html.twig');
    }
}

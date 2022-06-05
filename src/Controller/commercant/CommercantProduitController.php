<?php

namespace App\Controller\Commercant;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/commercant')]
class CommercantProduitController extends AbstractController
{
    #[Route('/produits', name: 'app_commercant_produits_index')]
    public function index(): Response
    {
        return $this->render('commercant/commercant_produit/produits_index.html.twig');
    }
}

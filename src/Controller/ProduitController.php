<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ProduitsRepository;
use App\Repository\BoutiqueRepository;
use App\Entity\Produits;

class ProduitController extends AbstractController
{
    #[Route('/produit/bonplans', name: 'app_produit_bonplans')]
    public function index(): Response
    {
        return $this->render('produit/bonplans.html.twig');
    }

    #[Route('/produits/single/{id}', name: 'app_single_produit')]
    public function single($id, ProduitsRepository $produitsRepo, BoutiqueRepository $boutiqueRepo): Response
    {
        $produit = $produitsRepo->findOneBy(['id' => $id]);
        $boutique = $boutiqueRepo->findOneBy(['id' => $produit->getBoutique()]);
        

        return $this->render('produit/detail_produit.html.twig', [
            'produit' => $produit,
            'boutique' => $boutique
        ]);
    }
}

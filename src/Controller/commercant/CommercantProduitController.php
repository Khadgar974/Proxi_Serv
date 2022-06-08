<?php

namespace App\Controller\Commercant;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ProduitsRepository;
use App\Entity\Produits;
use App\Form\ProduitsFormType;


#[Route('/commercant')]
class CommercantProduitController extends AbstractController
{
    #[Route('/produits', name: 'app_commercant_produits_index')]
    public function index(): Response
    {
        return $this->render('commercant/commercant_produit/produits_index.html.twig');
    }

    #[Route('/produits/add', name: 'app_commercant_add_produit')]
    public function addProduit(Request $request, ProduitsRepository $produitsRepo): Response
    {
        $produits = new Produits;
        $form = $this->createForm(ProduitsFormType::class, $produits);
        $form->handleRequest($request);
        return $this->render('commercant/commercant_produit/add_produit.html.twig', ['form' => $form->createView()]);
        
    }
}

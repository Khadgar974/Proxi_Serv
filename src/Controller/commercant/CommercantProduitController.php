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
    #[Route('/produits/single_com/', name: 'app_single_com_produit')]
    public function singleCom(): Response
    {
        return $this->render('commercant/commercant_produit/produit_detail_com.html.twig', []);
    }

    #[Route('/produits/single/', name: 'app_single_produit')]
    public function single(): Response
    {
        return $this->render('produit/detail_produit.html.twig', [
            
        ]);
    }

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

        if ($form->isSubmitted() && $form->isValid()) {
            // A faire le setUser avec l'utilisateur connecter.
            
            $produitsRepo->add($produits, true);

            return $this->redirectToRoute('app_commercant_produits_index', [], Response::HTTP_SEE_OTHER); // route a modifier, sera redirigé vers la page boutique
        }
        return $this->render('commercant/commercant_produit/add_produit.html.twig', ['form' => $form->createView()]);
        
    }
}

<?php

namespace App\Controller\Commercant;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ProduitsRepository;
use App\Repository\BoutiqueRepository;
use App\Entity\Produits;
use App\Form\ProduitsFormType;



#[Route('/commercant')]
class CommercantProduitController extends AbstractController
{
    #[Route('/produits/single_com/{id}', name: 'app_single_com_produit')]
    public function singleCom($id, ProduitsRepository $produitsRepo): Response
    {
        $produit = $produitsRepo->findOneBy(['id' => $id]);
        return $this->render('commercant/commercant_produit/produit_detail_com.html.twig', [
            'produit' => $produit
        ]);
    }

    // #[Route('/produits/single/{id}', name: 'app_single_produit')]
    // public function single($id, ProduitsRepository $produitsRepo, BoutiqueRepository $boutiqueRepo): Response
    // {
    //     $produit = $produitsRepo->findOneBy(['id' => $id]);
    //     $boutique = $boutiqueRepo->findOneBy(['id' => $produit->getBoutique()]);
        
    //     return $this->render('produit/detail_produit.html.twig', [
    //         'produit' => $produit, 
    //         'boutique' => $boutique
    //     ]);
    // }

    #[Route('/produits', name: 'app_commercant_produits_index')]
    public function index(ProduitsRepository $produitsRepo): Response
    {
        $boutique = $this->getUser()->getBoutique();
        $produits = $boutique->getProduits();       

        return $this->render('commercant/commercant_produit/produits_index.html.twig',[
            'produits' => $produits,
            'boutique' => $boutique,
        ]);
    }

    #[Route('/produits/add', name: 'app_commercant_add_produit')]
    public function addProduit(Request $request, ProduitsRepository $produitsRepo): Response
    {
        $produit = new Produits;
        $form = $this->createForm(ProduitsFormType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {    
                            
            $produit->setBoutique($this->getUser()->getBoutique());            
            $produitsRepo->add($produit, true);

            return $this->redirectToRoute('app_commercant_produits_index', [], Response::HTTP_SEE_OTHER); // route a modifier, sera redirigé vers la page boutique
        }
        return $this->render('commercant/commercant_produit/add_produit.html.twig', ['form' => $form->createView()]);
        
    }

    #[Route('/produits/edit/{id}', name: 'app_edit_produit', methods: 'GET|POST')]
    public function editProduit( $id,Request $request, ProduitsRepository $produitRepo): Response
    {
        
        $produit = $produitRepo->findOneBy(array('id' => $id));
        $form = $this->createForm(ProduitsFormType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $produitRepo->add($produit, true);
            // $this->addflash('success', 'Votre boutique a bien été modifié!');

            return $this->redirectToRoute('app_commercant_produits_index', [], Response::HTTP_SEE_OTHER); // route a modifier, sera redirigé vers la page boutique
        }

        return $this->render('commercant/commercant_produit/edit_produit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}

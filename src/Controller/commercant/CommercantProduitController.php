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
    #[Route('/produits/single_com/{id}', name: 'app_single_com_produit')]
    public function singleCom($id, ProduitsRepository $produitsRepo): Response
    {
        $produit = $produitsRepo->findOneBy(['id' => $id]);
        return $this->render('commercant/commercant_produit/produit_detail_com.html.twig', [
            'produit' => $produit
        ]);
    }

    #[Route('/produits/single/{id}', name: 'app_single_produit')]
    public function single($id, ProduitsRepository $produitsRepo): Response
    {
        $produit = $produitsRepo->findOneBy(['id' => $id]);
        
        
        return $this->render('produit/detail_produit.html.twig', [
            'produit' => $produit
        ]);
    }

    #[Route('/produits', name: 'app_commercant_produits_index')]
    public function index(ProduitsRepository $produitsRepo): Response
    {
        $produits = $produitsRepo->findAll();        

        return $this->render('commercant/commercant_produit/produits_index.html.twig',[
            'produits' => $produits
        ]);
    }

    #[Route('/produits/add', name: 'app_commercant_add_produit')]
    public function addProduit(Request $request, ProduitsRepository $produitsRepo): Response
    {
        $produits = new Produits;
        $form = $this->createForm(ProduitsFormType::class, $produits);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {                       
            
            $produitsRepo->add($produits, true);

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

            return $this->redirectToRoute('app_commercant_default', [], Response::HTTP_SEE_OTHER); // route a modifier, sera redirigé vers la page boutique
        }

        return $this->render('commercant/commercant_produit/edit_produit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}

<?php

namespace App\Controller\Commercant;

use App\Entity\Boutique;
use App\Entity\Produits;
use App\Form\BoutiqueFormType;
use App\Repository\BoutiqueRepository;
use App\Repository\ProduitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/commercant')]
class CommercantBoutiqueController extends AbstractController
{
    
    #[Route('/show', name: 'app_boutique_detail')]
    public function show(ProduitsRepository $produitsRepo): Response
    {
        $produits = $produitsRepo->findAll();

        return $this->render('boutique/boutique_detail.html.twig', [
            'produits' => $produits
        ]);
    }

    #[Route('/create_boutique', name: 'app_create_boutique')]
    public function createBoutique(Request $request, BoutiqueRepository $boutiqueRepo): Response
    {
        if($this->getUser()->getBoutique()) {
            return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
        }

        $boutique = new Boutique;
        $form = $this->createForm(BoutiqueFormType::class, $boutique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // A faire le setUser avec l'utilisateur connecter.
            $boutique->setUser($this->getUser());
            $boutiqueRepo->add($boutique, true);

            return $this->redirectToRoute('app_commercant_default', [], Response::HTTP_SEE_OTHER); // route a modifier, sera redirigé vers la page boutique
        }

        return $this->render('commercant/commercant_boutique/boutique_create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/edit_boutique/{id<[0-9]+>}', name: 'app_edit_boutique', methods: 'GET|POST')]
    public function editBoutique($id, Request $request, BoutiqueRepository $boutiqueRepo): Response
    {
        // Verif if user is propriétaire of this Animation +++++
        $boutique = $boutiqueRepo->findOneBy( array(
            'id'   => $id,
            'user' => $this->getUser()->getId()
        ));
        
        $form = $this->createForm(BoutiqueFormType::class, $boutique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $boutiqueRepo->add($boutique, true);
            // $this->addflash('success', 'Votre boutique a bien été modifié!');

            return $this->redirectToRoute('app_commercant_default', [], Response::HTTP_SEE_OTHER); // route a modifier, sera redirigé vers la page boutique
        }

        return $this->render('commercant/commercant_boutique/boutique_edit.html.twig', [
            'form' => $form->createView(),
        ]);
       
    }
}

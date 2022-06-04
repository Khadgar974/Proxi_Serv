<?php

namespace App\Controller;

use App\Entity\Boutique;
use App\Form\BoutiqueFormType;
use App\Repository\BoutiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/boutique')]
class BoutiqueController extends AbstractController
{
    #[Route('/', name: 'app_boutiques')]
    public function index(): Response
    {        
        return $this->render('boutique/boutiques_index.html.twig');
    }
    
    #[Route('/create_boutique', name: 'app_create_boutique')]
    public function createBoutique(Request $request, BoutiqueRepository $boutiqueRepo): Response
    {
        $boutique = new Boutique;
        $form = $this->createForm(BoutiqueFormType::class, $boutique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // A faire l'upload d'image pour le logo et pour la photo de la boutique.
            // A faire le setUser avec l'utilisateur connecter.
            $boutiqueRepo->add($boutique, true);

            return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('boutique/boutique_create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}

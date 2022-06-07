<?php

namespace App\Controller\Commercant;

use App\Entity\Boutique;
use App\Form\BoutiqueFormType;
use App\Repository\BoutiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/commercant')]
class CommercantBoutiqueController extends AbstractController
{
    #[Route('/create_boutique', name: 'app_create_boutique')]
    public function createBoutique(Request $request, BoutiqueRepository $boutiqueRepo): Response
    {
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
}

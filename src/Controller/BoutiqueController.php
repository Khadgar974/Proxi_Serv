<?php

namespace App\Controller;

use App\Entity\Boutique;
use App\Form\BoutiqueFormType;
use App\Repository\BoutiqueRepository;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/boutiques')]
class BoutiqueController extends AbstractController
{
    // Va renvoyer toutes les boutiques
    #[Route('/', name: 'app_index_boutiques')]
    public function index(BoutiqueRepository $boutiqueRepo, CategorieRepository $categorieRepo): Response
    {
        $categories = $categorieRepo->findAll();

        return $this->render('boutique/boutiques_index.html.twig', [
            
            'categories' => $categories
        ]);
    }

    // Va renvoyer une seule boutique
    #[Route('/single/{id}', name: 'app_single_boutique')]
    public function single($id, BoutiqueRepository $boutiqueRepo): Response
    {
        $boutique = $boutiqueRepo->findOneBy(['id' => $id]);
        $produits = $boutique->getProduits();
        $message = "";

        return $this->render('boutique/boutique_detail.html.twig', compact('boutique', 'produits', 'message'));
    }
}

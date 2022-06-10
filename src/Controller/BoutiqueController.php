<?php

namespace App\Controller;

use App\Entity\Boutique;
use App\Form\BoutiqueFormType;
use App\Repository\BoutiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/boutiques')]
class BoutiqueController extends AbstractController
{
    // Va renvoyer toutes les boutiques
    #[Route('/', name: 'app_index_boutiques')]
    public function index(BoutiqueRepository $boutiqueRepo): Response
    {   
        $boutiques = $boutiqueRepo->findAll();     
        return $this->render('boutique/boutiques_index.html.twig', ['boutiques' => $boutiques]);
    }    
   
}

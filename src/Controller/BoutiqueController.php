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
    // Va renvoyer toutes les boutiques
    #[Route('/', name: 'app_index_boutiques')]
    public function index(): Response
    {        
        return $this->render('boutiques/boutiques_index.html.twig');
    }    
   
}

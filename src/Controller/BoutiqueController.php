<?php

namespace App\Controller;

use App\Entity\Boutique;
use App\Form\BoutiqueFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/boutiques')]
class BoutiqueController extends AbstractController
{
    #[Route('/', name: 'app_boutiques')]
    public function index(): Response
    {        
        return $this->render('boutique/boutiques_index.html.twig');
    }
    
    #[Route('/create_boutique', name: 'app_create_boutique')]
    public function createBoutique(): Response
    {
        $boutique = new Boutique;
        $form = $this->createForm(BoutiqueFormType::class, $boutique);

        return $this->render('boutique/boutique_create.html.twig');
    }
}

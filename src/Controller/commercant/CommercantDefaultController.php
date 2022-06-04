<?php

namespace App\Controller\Commercant;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/commercant')]
class CommercantDefaultController extends AbstractController
{
    #[Route('/default', name: 'app_commercant_default')]
    public function index(): Response
    {
        return $this->render('commercant/CommercantIndex.html.twig');
    }
}

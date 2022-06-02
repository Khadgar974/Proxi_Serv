<?php

namespace App\Controller\admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/default')]
class AdminDefaultController extends AbstractController
{
    #[Route('/', name: 'app_admin_default')]
    public function index(): Response
    {
        return $this->render('admin/admin_default/index.html.twig');
    }
}

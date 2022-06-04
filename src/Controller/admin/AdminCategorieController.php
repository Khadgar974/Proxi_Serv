<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/categories')]
class AdminCategorieController extends AbstractController
{
    #[Route('/', name: 'app_admin_categories_index')]
    public function index(): Response
    {
        return $this->render('admin/admin_categorie/categories_index.html.twig', [
            'controller_name' => 'CategorieController',
        ]);
    }
}

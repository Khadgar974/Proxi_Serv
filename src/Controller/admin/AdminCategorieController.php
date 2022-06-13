<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Categorie;
use App\Form\CategorieType;

#[Route('/admin/categories')]
class AdminCategorieController extends AbstractController
{
    #[Route('/', name: 'app_admin_categories_index')]
    public function index(CategorieRepository $categorieRepo): Response
    {
        $categories = $categorieRepo->findAll();
        return $this->render('admin/admin_categorie/categories_index.html.twig', [
            'categories' => $categories,
        ]);
    }

    #[Route('/categorie/add', name: 'app_admin_add_categorie')]
    public function addCategorie(Request $request, CategorieRepository $categorieRepo): Response
    {
        $categorie = new Categorie;
        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $categorieRepo->add($categorie, true);

            return $this->redirectToRoute('app_admin_categories_index', [], Response::HTTP_SEE_OTHER);
        
        }
        return $this->render('admin/admin_categorie/add_categorie.html.twig', ['form' => $form->createView()]);
    }
}

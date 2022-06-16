<?php

namespace App\Controller;

use App\Repository\BoutiqueRepository;
use App\Repository\ProduitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    // #[Route('/', name: 'app_home')]
    // public function index(ProduitsRepository $produitsRepo): Response
    // {
    //     //$produits = $produitsRepo->findAll();
    //     //dd($produits);
    //     return $this->render('home/home.html.twig');
    // }

    // Renvois les boutiques pour afficher les logos dans la bannière et les produits bon plans
    #[Route('/', name: 'app_home')]
    public function bannieres(BoutiqueRepository $boutiqueRepo, 
                              ProduitsRepository $produitsRepo,
                              PaginatorInterface $paginator,
                              Request $request
                              ): Response
    {   
        $boutiques = $boutiqueRepo-> findBy(['is_active' => true], ['id' => 'DESC']);
        
        $datass = $produitsRepo-> findBy(['bon_plan' => true], ['id' => 'DESC']);

        foreach ($datass as $data) {
            if($data->getBoutique()->isIsActive())
            {
                $datas[] = $data;
            }
        }

        $prodBonPlans = $paginator->paginate(
            $datas,
            $request->query->getInt('page', 1),
            8
        );

        return $this->render('home/home.html.twig',  compact('boutiques', 'prodBonPlans'));
    }

     // page pour les mentions légales
     #[Route('/mentions_legales', name: 'app_mentions_legale', methods: 'GET')]
     public function mentionsLegales(): Response
     {
         return $this->render('home/mentions_legales/mentions_legales.html.twig');   
     }

}

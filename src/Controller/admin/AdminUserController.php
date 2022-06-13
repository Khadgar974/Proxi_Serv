<?php

namespace App\Controller\Admin;

use App\Repository\BoutiqueRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/users')]
class AdminUserController extends AbstractController
{
    #[Route('/utilisateurs', name: 'app_admin_utilisateurs_index')]

    public function utilisateursIndex(UserRepository $userRepository): Response
    { 
        $utilisateurs = $userRepository->findBy(['type_user' => 0], ['id' => 'DESC']);
        return $this->render('admin/admin_user/index_utilisateurs.html.twig', compact('utilisateurs'));
    }


    #[Route('/commercants', name: 'app_admin_commercants_index')]
    public function index(UserRepository $userRepository): Response
    { 
        $commercants = $userRepository->findBy(['type_user' => 1], ['id' => 'DESC']);        
        return $this->render('admin/admin_user/index_commercants.html.twig', compact('commercants'));
    }

    #[Route('/commercants/activer_desactiver_boutique/{id<[0-9]+>}', name: 'app_admin_enable_disable_shop')]
    public function enableDisableShop($id, UserRepository $userRepository, BoutiqueRepository $boutiqueRepo): Response
    { 
        $commercant = $userRepository->findOneBy(['id' => $id]);
        $boutique = $commercant->getBoutique();
        $boutique->isIsActive() ? $boutique->setIsActive(false) : $boutique->setIsActive(true);
        $boutiqueRepo->add($boutique, true);

        return $this->redirectToRoute('app_admin_commercants_index', [], Response::HTTP_SEE_OTHER);
    }    
}

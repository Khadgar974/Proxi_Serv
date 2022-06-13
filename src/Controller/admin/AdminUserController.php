<?php

namespace App\Controller\Admin;

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

        return $this->render('admin/admin_user/index_commercants.html.twig', [
            
        ]);
    }
}

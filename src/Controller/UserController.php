<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\EditUserType;
use App\Entity\User;
use App\Repository\UserRepository;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {
        if ($this->getUser()) {
            
        }
        return $this->render('user/single.html.twig', [
            
        ]);
    }

    #[Route('/user/edit/', name: 'app_user_edit_user')]
    public function editUser(Request $request, UserRepository $userRepository): Response
    {   
        $user = new User();    
        $form = $this->createForm(EditUserType::class, $this->getUser());
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $userRepository->add($this->getUser(), true);
            
            return $this->redirectToRoute('app_user', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('user/edit_user.html.twig', [
            'form' => $form->createView()
        ]);
    }
}

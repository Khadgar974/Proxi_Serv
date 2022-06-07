<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use App\Repository\UserRepository;
use Symfony\Component\Security\Http\Authenticator\FormLoginAuthenticator;
use App\Security\SecurityAuthenticator;



class RegistrationController extends AbstractController
{

    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager,UserAuthenticatorInterface $authenticatorManager, UserRepository $userRepository): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $newPassword = $userPasswordHasher->hashPassword($user, $form->get('plainpassword')->getData());
            $user->setPassword($newPassword);
            $user->setToken(null);
            $userRepository->add($user, true);
            return $this->redirectToRoute('app_login', [], Response::HTTP_SEE_OTHER);
            //$user->getTypeUser();

            $choicerole = $form->get('type_user')->getData();
            
            if (empty($choicerole)) {
               
            } else {
                $user->setRoles([$choicerole]);               
            }

            $entityManager->persist($user);
            $entityManager->flush();            
            return $this->redirectToRoute('app_login');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}

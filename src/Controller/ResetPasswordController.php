<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;
use App\Repository\UserRepository;
use App\Form\ResetPasswordType;
use App\Form\ModifPasswordType;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class ResetPasswordController extends AbstractController
{
    #[Route('/reset/password', name: 'app_reset_password')]
    public function index(request $request, UserRepository $userRepository, TokenGeneratorInterface $tokenGenerator, MailerInterface $mailer): Response
    {   
        $error ='';
        $success = false;
        $form = $this->createForm(ResetPasswordType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $email = $form->get('email')->getData();
            $user = $userRepository->findOneBy(['email' => $email]);
            if(!$user) {
                die('mort');
            } else {
                $newToken = $tokenGenerator->generateToken();
                $user->setToken($newToken);
                $userRepository->add($user, true);

                $url = $this->generateUrl('app_modif_password', ['token' => urlencode($newToken), 'id' => $user->getId()], UrlGeneratorInterface::ABSOLUTE_URL);
                $sendEmail = (new TemplatedEmail())
                    ->from('fabien@example.com')
                    ->to($email)
                    ->subject('Modifier votre mot de passse')
                    ->htmlTemplate('email/forgetpassword.html.twig')
                    ->context([
                        'url' => $url
                    ]);
                $mailer->send($sendEmail);
                $success = true;
            }

            
        }
        return $this->render('reset_password/index.html.twig', [
           'form' => $form->createView(),
           'success' => $success,
           'error' => $error
        ]);
    }
    #[Route('/modif/password/{id}/{token}', name: 'app_modif_password')]
    public function modifPassword($token, $id, Request $request, UserRepository $userRepository, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $user = $userRepository->findOneBy(['id' => $id, 'token' => $token]);
        
        if ($user) {
            $form = $this->createForm(ModifPasswordType::class);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $newPassword = $userPasswordHasher->hashPassword($user, $form->get('plainpassword')->getData());
                $user->setPassword($newPassword);
                $user->setToken(null);
                $userRepository->add($user, true);
                return $this->redirectToRoute('app_login', [], Response::HTTP_SEE_OTHER);
            }
        } else {
            throw $this->createNotFoundException('error');
        }
        return $this->render('reset_password/modif.html.twig', [
            'form' => $form->createView()
        ]);
    }
}

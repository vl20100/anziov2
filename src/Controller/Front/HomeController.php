<?php

namespace App\Controller\Front;

use App\Entity\User;
use App\Utils\StringHelper;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route("/")]
    public function home(Request $request, ManagerRegistry $doctrine, UserPasswordHasherInterface $passwordHasher): Response
    {
        /*$u = new User();
        $plainPassword = 'vAnzi2608?';

        $hashedPassword = $passwordHasher->hashPassword(
            $u,
            $plainPassword
        );

        $u
            ->setUsername('vincent')
            ->setRoles(['ROLE_SUPER_ADMIN'])
            ->setPassword($hashedPassword);

        $em = $doctrine->getManager();
        $em->persist($u);
        $em->flush();*/

        return $this->redirectToRoute('app_back_admin_home');
    }
}
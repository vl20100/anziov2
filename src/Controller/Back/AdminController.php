<?php

namespace App\Controller\Back;

use App\Entity\User;
use App\Utils\StringHelper;
use Doctrine\Persistence\ManagerRegistry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/administranzio")]
#[isGranted("ROLE_ADMIN")]
class AdminController extends AbstractController
{
    #[Route("/")]
    public function home(Request $request, ManagerRegistry $doctrine): Response
    {
        return $this->render('back/home.html.twig');
    }
}
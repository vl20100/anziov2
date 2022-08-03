<?php

namespace App\Controller\Front;

use App\Repository\PizzaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    #[Route('/menu')]
    public function menu(Request $request, PizzaRepository $pizzaRepository): Response
    {
        $pizzas = $pizzaRepository->findAll();

        return $this->render('front/menu.html.twig', [
            'pizzas' => $pizzas
        ]);
    }
}
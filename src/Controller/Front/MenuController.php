<?php

namespace App\Controller\Front;

use App\Repository\PizzaBaseRepository;
use App\Repository\PizzaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    #[Route('/menu')]
    public function menu(Request $request, PizzaRepository $pizzaRepository, PizzaBaseRepository $baseRepository): Response
    {
        $pizzas = $pizzaRepository->findAll();
        $bases = $baseRepository->findAll();

        return $this->render('front/menu.html.twig', [
            'pizzas' => $pizzas,
            'bases' => $bases
        ]);
    }
}
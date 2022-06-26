<?php

namespace App\Controller\Back;

use App\Entity\Pizza;
use App\Form\PizzaType;
use App\Repository\PizzaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/administranzio/pizza')]
class PizzaController extends AbstractController
{
    #[Route('/', methods: ['GET'])]
    public function index(PizzaRepository $pizzaRepository): Response
    {
        return $this->render('back/pizza/index.html.twig', [
            'pizzas' => $pizzaRepository->findAll(),
        ]);
    }

    #[Route('/new', methods: ['GET', 'POST'])]
    public function new(Request $request, PizzaRepository $pizzaRepository): Response
    {
        $pizza = new Pizza();
        $form = $this->createForm(PizzaType::class, $pizza);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pizzaRepository->add($pizza, true);

            return $this->redirectToRoute('app_back_pizza_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/pizza/new.html.twig', [
            'pizza' => $pizza,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', methods: ['GET'])]
    public function show(Pizza $pizza): Response
    {
        return $this->render('back/pizza/show.html.twig', [
            'pizza' => $pizza,
        ]);
    }

    #[Route('/{id}/edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pizza $pizza, PizzaRepository $pizzaRepository): Response
    {
        $form = $this->createForm(PizzaType::class, $pizza);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pizzaRepository->add($pizza, true);

            return $this->redirectToRoute('app_back_pizza_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/pizza/edit.html.twig', [
            'pizza' => $pizza,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', methods: ['POST'])]
    public function delete(Request $request, Pizza $pizza, PizzaRepository $pizzaRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pizza->getId(), $request->request->get('_token'))) {
            $pizzaRepository->remove($pizza, true);
        }

        return $this->redirectToRoute('app_back_pizza_index', [], Response::HTTP_SEE_OTHER);
    }
}

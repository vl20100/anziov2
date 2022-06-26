<?php

namespace App\Controller\Back;

use App\Entity\PizzaBase;
use App\Form\PizzaBaseType;
use App\Repository\PizzaBaseRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/administranzio/pizzabase')]
#[isGranted('ROLE_SUPER_ADMIN')]
class PizzaBaseController extends AbstractController
{
    #[Route('/', methods: ['GET'])]
    public function index(PizzaBaseRepository $pizzaBaseRepository): Response
    {
        return $this->render('back/pizza_base/index.html.twig', [
            'pizza_bases' => $pizzaBaseRepository->findAll(),
        ]);
    }

    #[Route('/new', methods: ['GET', 'POST'])]
    public function new(Request $request, PizzaBaseRepository $pizzaBaseRepository): Response
    {
        $pizzaBase = new PizzaBase();
        $form = $this->createForm(PizzaBaseType::class, $pizzaBase);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pizzaBaseRepository->add($pizzaBase, true);

            return $this->redirectToRoute('app_back_pizzabase_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/pizza_base/new.html.twig', [
            'pizza_base' => $pizzaBase,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', methods: ['GET'])]
    public function show(PizzaBase $pizzaBase): Response
    {
        return $this->render('back/pizza_base/show.html.twig', [
            'pizza_base' => $pizzaBase,
        ]);
    }

    #[Route('/{id}/edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PizzaBase $pizzaBase, PizzaBaseRepository $pizzaBaseRepository): Response
    {
        $form = $this->createForm(PizzaBaseType::class, $pizzaBase);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pizzaBaseRepository->add($pizzaBase, true);

            return $this->redirectToRoute('app_back_pizzabase_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/pizza_base/edit.html.twig', [
            'pizza_base' => $pizzaBase,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', methods: ['POST'])]
    public function delete(Request $request, PizzaBase $pizzaBase, PizzaBaseRepository $pizzaBaseRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pizzaBase->getId(), $request->request->get('_token'))) {
            $pizzaBaseRepository->remove($pizzaBase, true);
        }

        return $this->redirectToRoute('app_back_pizzabase_index', [], Response::HTTP_SEE_OTHER);
    }
}

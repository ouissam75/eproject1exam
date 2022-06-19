<?php

namespace App\Controller;

use App\Entity\Salaries;
use App\Form\SalariesType;
use App\Repository\SalariesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('\Salaries')]
class SalariesController extends AbstractController
{
    #[Route('/', name: 'app_salaries_index', methods: ['GET'])]
    public function index(SalariesRepository $SalariesRepository): Response
    {
        return $this->render('salaries/index.html.twig', [
            'Salaries' => $SalariesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_salaries_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SalariesRepository $SalariesRepository): Response
    {
        $Salaries = new Salaries();
        $form = $this->createForm(SalariesType::class, $Salaries);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $SalariesRepository->add($Salaries, true);

            return $this->redirectToRoute('app_home_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('home/new.html.twig', [
            'salary' => $Salaries,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_salaries_show', methods: ['GET'])]
    public function show(Salaries $Salaries): Response
    {
        return $this->render('salaries/show.html.twig', [
            'Salaries' => $Salaries,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_salaries_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Salaries $Salaries, SalariesRepository $SalariesRepository): Response
    {
        $form = $this->createForm(SalariesType::class, $Salaries);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $SalariesRepository->add($Salaries, true);

            return $this->redirectToRoute('app_saries_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('salaries/edit.html.twig', [
            'salary' => $Salaries,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_salaries_delete', methods: ['POST'])]
    public function delete(Request $request, Salaries $Salaries, SalariesRepository $SalariesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$Salaries->getId(), $request->request->get('_token'))) {
            $SalariesRepository->remove($Salaries, true);
        }

        return $this->redirectToRoute('app_salaries_index', [], Response::HTTP_SEE_OTHER);
    }
}

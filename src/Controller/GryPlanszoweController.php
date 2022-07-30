<?php

namespace App\Controller;

use App\Entity\Crud;
use App\Entity\GryPlanszowe;
use App\Form\GryPlanszoweType;
use App\Repository\GryPlanszoweRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class GryPlanszoweController extends AbstractController
{
    #[Route('/', name: 'app_gry_planszowe_index', methods: ['GET'])]
    public function index(GryPlanszoweRepository $gryPlanszoweRepository): Response
    {

        return $this->render('gry_planszowe/index.html.twig', [
            'gry_planszowes' => $gryPlanszoweRepository->findAll(),

        ]);
    }

    #[Route('/new', name: 'app_gry_planszowe_new', methods: ['GET', 'POST'])]
    public function new(Request $request, GryPlanszoweRepository $gryPlanszoweRepository): Response
    {
        $gryPlanszowe = new GryPlanszowe();
        $form = $this->createForm(GryPlanszoweType::class, $gryPlanszowe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $gryPlanszoweRepository->add($gryPlanszowe, true);

            return $this->redirectToRoute('app_gry_planszowe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('gry_planszowe/new.html.twig', [
            'gry_planszowe' => $gryPlanszowe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_gry_planszowe_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, GryPlanszowe $gryPlanszowe, GryPlanszoweRepository $gryPlanszoweRepository): Response
    {
        $form = $this->createForm(GryPlanszoweType::class, $gryPlanszowe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $gryPlanszoweRepository->add($gryPlanszowe, true);

            return $this->redirectToRoute('app_gry_planszowe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('gry_planszowe/edit.html.twig', [
            'gry_planszowe' => $gryPlanszowe,
            'form' => $form,
        ]);
    }

    #[Route('{id}/change', name: 'app_change', methods: ['GET', 'POST'])]
    public function status(ManagerRegistry $doctrine, int $id): Response
    {
        {
            $entityManager = $doctrine->getManager();
            $gryPlanszowe = $entityManager->getRepository(GryPlanszowe::class)->find($id);

            if (!$gryPlanszowe) {
                throw $this->createNotFoundException(
                    'No product found for id ' . $id
                );
            }
            $gryPlanszowe->setUzupelnienie($gryPlanszowe->change());
            $entityManager->flush();

            return $this->redirectToRoute('app_gry_planszowe_index');
        }
            }

    #[Route('/{id}', name: 'app_gry_planszowe_delete', methods: ['POST'])]
    public function delete(Request $request, GryPlanszowe $gryPlanszowe, GryPlanszoweRepository $gryPlanszoweRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gryPlanszowe->getId(), $request->request->get('_token'))) {
            $gryPlanszoweRepository->remove($gryPlanszowe, true);
        }

        return $this->redirectToRoute('app_gry_planszowe_index', [], Response::HTTP_SEE_OTHER);
    }


}

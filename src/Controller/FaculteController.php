<?php

namespace App\Controller;

use App\Entity\Faculte;
use App\Form\FaculteType;
use App\Repository\FaculteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/faculte")
 */
class FaculteController extends AbstractController
{
    /**
     * @Route("/", name="app_faculte_index", methods={"GET"})
     */
    public function index(FaculteRepository $faculteRepository): Response
    {
        return $this->render('faculte/index.html.twig', [
            'facultes' => $faculteRepository->findAll(),
            
        ]);
    }

    /**
     * @Route("/new", name="app_faculte_new", methods={"GET", "POST"})
     */
    public function new(Request $request, FaculteRepository $faculteRepository): Response
    {
        $faculte = new Faculte();
        $form = $this->createForm(FaculteType::class, $faculte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $faculteRepository->add($faculte, true);

            return $this->redirectToRoute('app_faculte_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('faculte/new.html.twig', [
            'faculte' => $faculte,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_faculte_show", methods={"GET"})
     */
    public function show(Faculte $faculte): Response
    {
        return $this->render('faculte/show.html.twig', [
            'faculte' => $faculte,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_faculte_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Faculte $faculte, FaculteRepository $faculteRepository): Response
    {
        $form = $this->createForm(FaculteType::class, $faculte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $faculteRepository->add($faculte, true);

            return $this->redirectToRoute('app_faculte_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('faculte/edit.html.twig', [
            'faculte' => $faculte,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_faculte_delete", methods={"POST"})
     */
    public function delete(Request $request, Faculte $faculte, FaculteRepository $faculteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$faculte->getId(), $request->request->get('_token'))) {
            $faculteRepository->remove($faculte, true);
        }

        return $this->redirectToRoute('app_faculte_index', [], Response::HTTP_SEE_OTHER);
    }
}
// src/Controller/UserController.php

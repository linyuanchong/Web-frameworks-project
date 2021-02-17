<?php

namespace App\Controller;

use App\Entity\Make;
use App\Form\MakeType;
use App\Repository\MakeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/make")
 */
class MakeController extends AbstractController
{
    /**
     * @Route("/", name="make_index", methods={"GET"})
     */
    public function index(MakeRepository $makeRepository): Response
    {
        return $this->render('make/index.html.twig', [
            'makes' => $makeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="make_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $make = new Make();
        $form = $this->createForm(MakeType::class, $make);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($make);
            $entityManager->flush();

            return $this->redirectToRoute('make_index');
        }

        return $this->render('make/new.html.twig', [
            'make' => $make,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="make_show", methods={"GET"})
     */
    public function show(Make $make): Response
    {
        return $this->render('make/show.html.twig', [
            'make' => $make,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="make_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Make $make): Response
    {
        $form = $this->createForm(MakeType::class, $make);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('make_index');
        }

        return $this->render('make/edit.html.twig', [
            'make' => $make,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="make_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Make $make): Response
    {
        if ($this->isCsrfTokenValid('delete'.$make->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($make);
            $entityManager->flush();
        }

        return $this->redirectToRoute('make_index');
    }
}

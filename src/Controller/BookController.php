<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookAdminType;
use App\Form\BookStaffType;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/book")

 */
class BookController extends AbstractController
{
    /**
     * @Route("/", name="book_index", methods={"GET"})
     */
    public function index(BookRepository $bookRepository): Response
    {
        if ($this->getUser() == NULL || $this->getUser()->getRole() == "ROLE_ADMIN") {
            return $this->render('book/index.html.twig', [
                'books' => $bookRepository->findAll(),
            ]);
        }
        else {
            $club = $this->getUser()->getClub();

            return $this->render('book/index.html.twig', [
                'books' => $bookRepository->findByClubOrderByName($club),
            ]);
        }
    }

    /**
     * @Route("/new_by_admin", name="book_new_by_admin", methods={"GET","POST"})
     */
    public function newByAdmin(Request $request): Response
    {
        $book = new Book();
        $form = $this->createForm(BookAdminType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($book);
            $entityManager->flush();

            return $this->redirectToRoute('book_index');
        }

        return $this->render('book/new.html.twig', [
            'book' => $book,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/new_by_staff", name="book_new_by_staff", methods={"GET","POST"})
     */

    public function newByStaff(Request $request): Response
    {
        $book = new Book();
        $form = $this->createForm(BookStaffType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $club = $this->getUser()->getClub();
            $book->setClub($club);

            $entityManager->persist($book);
            $entityManager->flush();

            return $this->redirectToRoute('book_index');
        }

        return $this->render('book/new.html.twig', [
            'book' => $book,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="book_show", methods={"GET"})
     */
    public function show(Book $book): Response
    {
        return $this->render('book/show.html.twig', [
            'book' => $book,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="book_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Book $book): Response
    {
        $form = $this->createForm(BookStaffType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('book_index');
        }

        return $this->render('book/edit.html.twig', [
            'book' => $book,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="book_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Book $book): Response
    {
        if ($this->isCsrfTokenValid('delete'.$book->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($book);
            $entityManager->flush();
        }

        return $this->redirectToRoute('book_index');
    }
}

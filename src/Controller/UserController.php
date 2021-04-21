<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserAdminType;
use App\Form\User2Type;
use App\Form\UserStaffType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        if ($this->getUser()->getRole() == "ROLE_ADMIN") {
            return $this->render('user/index.html.twig', [
                'users' => $userRepository->findAll(),
            ]);
        }
        else {
            $club = $this->getUser()->getClub();

            return $this->render('user/index.html.twig', [
                'users' => $userRepository->findByClubOrderByName($club),
            ]);
        }
    }

    /**
     * @Route("/new_by_admin", name="user_new_by_admin", methods={"GET","POST"})
     */
    public function newByAdmin(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new User();
        $form = $this->createForm(UserAdminType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            //Encode password.
            $plainPassword = $user->getPassword();
            $encodedPassword = $passwordEncoder->encodePassword($user, $plainPassword);
            $user->setPassword($encodedPassword);

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/new_by_staff", name="user_new_by_staff", methods={"GET","POST"})
     */
    public function newByStaff(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new User();
        $form = $this->createForm(UserStaffType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            //Encode password.
            $plainPassword = $user->getPassword();
            $encodedPassword = $passwordEncoder->encodePassword($user, $plainPassword);
            $user->setPassword($encodedPassword);
            $club = $this->getUser()->getClub();
            $user->setClub($club);
            $user->setRole('ROLE_USER');

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserStaffType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index');
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $template = 'default/index.html.twig';
        $args = [];
        return $this->render($template, $args);
    }
    /**
     * @Route("/book", name="book")
     */
    public function book(): Response
    {
        $template = 'default/book.html.twig';
        $args = [];
        return $this->render($template, $args);
    }
    /**
     * @Route("/club", name="club")
     */
    public function club(): Response
    {
    }

}

<?php

namespace App\Controller;

use App\Entity\Category;
<<<<<<< HEAD
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
=======
use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
>>>>>>> 01b70c588d287033252263c804b8b8175967d92b

class RenderController extends AbstractController
{

<<<<<<< HEAD
=======
    const MAX_POST = 3;

>>>>>>> 01b70c588d287033252263c804b8b8175967d92b
    public function __construct(private EntityManagerInterface $manager)
    {
    }

<<<<<<< HEAD
    public function renderSidebar()
    {
        $categories = $this->manager->getRepository(Category::class)->findAll();

        return $this->render('render/sidebar.html.twig', [
            'categories' => $categories
=======
    public function renderSidebar(): Response
    {
        $posts = $this->manager->getRepository(Post::class)
            ->findBy([], ['publishedAt' => 'DESC'], self::MAX_POST);

        $categories = $this->manager->getRepository(Category::class)->findAll();

        return $this->render('components/_sidebar.html.twig', [
            'posts' => $posts,
            'categories' => $categories,
>>>>>>> 01b70c588d287033252263c804b8b8175967d92b
        ]);
    }

    /**
     * Permet de déclencher le rendu de la navbar.
     */
    public function renderNavigation(): \Symfony\Component\HttpFoundation\Response
    {
        # Récupération des catégories de la BDD
        $categories = $this->manager->getRepository(Category::class)->findAll();

        # Rendu de la vue
        return $this->render('components/_nav.html.twig', [
            'categories' => $categories
        ]);
    }
}
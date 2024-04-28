<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RenderController extends AbstractController
{

    public function __construct(private EntityManagerInterface $manager)
    {
    }

    public function renderSidebar()
    {
        $categories = $this->manager->getRepository(Category::class)->findAll();

        return $this->render('render/sidebar.html.twig', [
            'categories' => $categories
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
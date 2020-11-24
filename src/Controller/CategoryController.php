<?php

namespace App\Controller;

use App\Helper\Menu;
use App\ModelDBAL\Fetcher;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @var Menu
     */
    private $sidebar;

    public function __construct(Menu $menu)
    {
        $this->sidebar = $menu;
    }

    /**
     * @Route("/category/{id}", name="category_index")
     * @param Fetcher $fetcher
     * @param string $id
     * @return Response
     */
    public function index(Fetcher $fetcher, string $id)
    {
        $products = $fetcher->findProductsByCategory($id);

        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
            'products' => $products,
            'sidebar' => $this->sidebar->getSidebar($id),
        ]);
    }
}

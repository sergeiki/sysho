<?php

namespace App\Controller;

use App\ModelDBAL\Fetcher;
use App\ModelORM\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{id}", name="product_index")
     * @param Fetcher $fetcher
     * @param String $id
     * @return Response
     */
    public function index(Fetcher $fetcher, String $id)
    {
        $found_product = $fetcher->findAllCategories('product_product', ['id' => $id]);

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'found_product' => $found_product,
        ]);
    }
}

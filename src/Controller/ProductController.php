<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function index(): Response
    {
        $product = new Product();
        $product->setName("Keyboard");
        $product->setPrice(1999);
        $product->setDescription("Ergonomic and stylish!");
        
        
        return $this->json([
            'product' => [
                "name"=> $product->getName(),
                "desc"=> $product->getDescription(),
            ]
        ]);
    }
}

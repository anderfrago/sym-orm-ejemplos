<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'app_category')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $category = $doctrine->getRepository(Category::class)->find(1);
        
        $products = $category->getProducts();
                
        return $this->render('category/index.html.twig', [
          //  'category' => $category,
            'products' => $products,
        ]);
    }
    
}

<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class ProductController extends AbstractController
{
    //public $doctrine;
    public function __constructor(ManagerRegistry $doctrine){
      //  $this->doctrine = $doctrine;        
    }
       
    
    #[Route('/product', name: 'app_product')]
    public function index(ManagerRegistry $doctrine): Response
    {
        // Entity manager
        $em = $doctrine->getManager();
        
        $product = new Product();
        $product->setName("Keyboard");
        $product->setPrice(1999);
        $product->setDescription("Ergonomic and stylish!");
        // Ahora, debemos agregar category a nuestros nuevos products
        $category = new Category();
        $category->setName("informatics");
        $em->persist($category);
        // Otra alternativa, sería asociar a una categoría existente
        $category = $doctrine->getRepository(Category::class)->findOnBy([
            "name" => "miscellaneous"
        ]);
        $product->setCategory($category);
        
        
        
        
        
        // Insert en base de datos
        $em->persist($product);
        $em->flush();
        
        
        return $this->json([
            'product' => [
                "name"=> $product->getName(),
                "desc"=> $product->getDescription(),
            ]
        ]);
    }
    
    
    
    
     
    #[Route('/product-list', name: 'app_product_list')]
    public function productlist(ManagerRegistry $doctrine): Response
    {
        $products = $doctrine->getRepository(Product::class)->findAll();    
        $products_json=[];
        $tmp=[];
        foreach ($products as $product){
            $tmp[] = [
                "id" => $product->getId(),
                "name" => $product->getName(),
                "price" => $product->getPrice(),
                "desc" => $product->getDescription()
            ];
            $products_json[] = $tmp;
        }
        return $this->json([
            "products" => $products_json
        ]);
    }
    
    
         
    #[Route('/product/{id}', name: 'app_product_details')]
    public function productdetails(  $id,      ManagerRegistry $doctrine): Response
    {
        //$product = $doctrine->getRepository(Product::class)->find($id);
        $product = $doctrine->getRepository(Product::class)->findOneBy([
            "id" => $id
        ]);        
        $product_json = [
                "id" => $product->getId(),
                "name" => $product->getName(),
                "price" => $product->getPrice(),
                "desc" => $product->getDescription()
        ];       
        return $this->json([
            "product" => $product_json 
        ]);
    }
    
    #[Route('/product/{id}/{name}', name: 'app_product_edit')]
    public function productedit(  $id,$name  ,   ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $product = $doctrine->getRepository(Product::class)->findOneBy([
            "id" => $id
        ]); 
        $product->setName($name);
        // Actualizamos el valor
        $em->persist($product);
        $em->flush();
        $product1 = $doctrine->getRepository(Product::class)->findOneBy([
            "id" => $id
        ]);
        $product_json = [
                "id" => $product1->getId(),
                "name" => $product1->getName(),
                "price" => $product1->getPrice(),
                "desc" => $product1->getDescription()
        ];       
        return $this->json([
            "product" => $product_json 
        ]);
    }
    
    
    
    
    
    
    
    
    
}

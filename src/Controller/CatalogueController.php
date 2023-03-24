<?php

namespace App\Controller;

use App\Repository\OfferByProductRepository;
use App\Repository\OffersRepository;
use App\Repository\ProductRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\UrlHelper;

class CatalogueController extends AbstractController
{
    /**
     * @Route("/search/catalogue", name="catalogue")     
     */
    public function  index(Request $request, ProductRepository $productRepository)
    { 
        return $this->json($productRepository->search());
    }
    
}
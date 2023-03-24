<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductSearchType;
use App\Entity\ProductSearchEntity;
use App\Repository\ProductRepository;
use App\Service\CartService;
use Knp\Component\Pager\PaginatorInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_front")
     */    
    public function index(Request $request, ProductRepository $productRepository, PaginatorInterface $paginator): Response
    {
        $search = new ProductSearchEntity();                
        $form = $this->createForm(ProductSearchType::class, $search);
        $form->handleRequest($request);
        $products = $paginator->paginate(
            $productRepository->findAllQuery($search),
            $request->query->getInt('page', 1), /*page number*/
            6
         );
        return $this->render('home/index.html.twig', [
            'products' => $products,   
            'form' => $form->createView(),         
        ]);
    }
    

    /**
     * @Route("/{name}-{id}", name="app_front_show", requirements={"slug":"[\d+]*"})
     */    
    public function show(ProductRepository $productRepository, Product $product, Request $request, ManagerRegistry $doctrine): Response
    {
        $product = $doctrine->getRepository(Product::class)->find($request->get('id'));         
        return $this->render('home/show.html.twig', [
            'product' => $product,
        ]);
    }
    /**
     * @Route("/add/{id}", name="cart_add")
     */    
    public function add($id, CartService $cartService)
    {     
        $cartService->add($id);
        return $this->redirectToRoute('cart_get');
    }
    /**
     * @Route("/cart", name="cart_get")
     */    
    public function getCart(CartService $cartService)
    {
        $cartWithData = $cartService->getFullCart();
        $total = $cartService->getTotal();
        return $this->render('home/cart.html.twig', [
            'items' => $cartWithData,
            'total' => $total,
        ]);
    }

    /**
     * @Route("/cart/remove/{id}", name="cart_remove")
     */    
    public function remove(CartService $cartService, $id)
    {
        $cartService->remove($id);
        return $this->redirectToRoute('cart_get');
    }
    /**
     * @Route("/empty", name="app_empty")
     */
    public function empty(CartService $cartService)
    {
        $cartService->empty();
        return $this->redirectToRoute('cart_get');
    }
}

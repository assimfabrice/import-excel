<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
/**
 * @Route("/admin/product", name="app_admin_product_")
 */
class ProductController extends AbstractController
{
    /**     
     * @Route("/", name="index", methods="GET|POST")     
     */
    public function index(ProductRepository $productsRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $products = $productsRepository->findAll();
        
        return $this->render('admin/product/index.html.twig', [
            'products' => $products,
        ]);
    }
    /**     
     *
     * @Route("/{id}/edit", name="edit", methods="GET|POST")     
     */
    public function edit(Request $request, Product $product, EntityManagerInterface $entityManager):Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
         $form = $this->createForm(ProductType::class, $product);
         $form->handleRequest($request);
         if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($product);
            $entityManager->flush();
            $this->addFlash('success', 'Produit modifié avec succès');
            return $this->redirectToRoute('app_admin_product_index');
         }
         return $this->render('admin/product/edit.html.twig', [
             'form' => $form->createView(),
         ]);
    }

    /**     
     *
     * @Route("/{id}/delete", name="delete", methods="POST")     
     */
    public function delete(Request $request, Product $product, EntityManagerInterface $entityManager)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        if($this->isCsrfTokenValid('delete' . $product->getId(), $request->get('_token'))) {
            $entityManager->remove($product);
            $entityManager->flush();
            $this->addFlash('success', 'Produit supprimé avec succès');
        }
        return $this->redirectToRoute('app_admin_product_index');          
    }
    /**
     * @Route("/new", methods="GET|POST", name="new")     
     */
    public function new(Request $request): Response
    {
        $product = new Product();       
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
        
            $this->addFlash('success', 'Produit crée avec succès');
            return $this->redirectToRoute('app_admin_product_index');
        }

        return $this->render('admin/product/new.html.twig', [
            'post' => $product,
            'form' => $form->createView(),
        ]);
    }
}

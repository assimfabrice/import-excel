<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
/**
 * @Route("/admin", name="app_admin_")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(UserRepository $userRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $users = $userRepository->findAll();        
        return $this->render('admin/index.html.twig', [
            'users' => $users,
        ]);
    }
    /**     
     *
     * @Route("/{id}/edit", name="edit", methods="GET|POST")     
     */
    public function edit(Request $request, User $user, EntityManagerInterface $entityManager):Response
    {
         $this->denyAccessUnlessGranted('ROLE_ADMIN');
         $form = $this->createForm(UserType::class, $user);
         $form->handleRequest($request);
         if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();
            $this->addFlash('success', 'Utilisateur modifié avec succès');
            return $this->redirectToRoute('app_admin_index');
         }
         return $this->render('admin/user_edit.html.twig', [
             'form' => $form->createView(),
         ]);
    }

    /**     
     *
     * @Route("/{id}/delete", name="delete", methods="POST")     
     */
    public function delete(Request $request, User $user, EntityManagerInterface $entityManager)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        if($this->isCsrfTokenValid('delete' . $user->getId(), $request->get('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
            $this->addFlash('success', 'Utilisateur supprimé avec succès');
        }
        return $this->redirectToRoute('app_admin_index');          
    }
    /**     
     * @Route("/new", methods="GET|POST", name="admin_post_new")     
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $product = new Product();
        $form = $this->createForm(PostType::class, $product);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
        }
        return $this->redirectToRoute('app_admin_index');
    }
}

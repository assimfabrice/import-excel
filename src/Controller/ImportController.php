<?php

namespace App\Controller;

use App\Form\ImportType;
use App\Service\ImportDatas;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImportController extends AbstractController
{
    /**
     * @Route("/import", name="app_import")
     * @param Request $request
     * @param mixed $name
     */
    public function index(Request $request, ImportDatas $importDatas): Response
    {
        $form = $this->createForm(ImportType::class, null);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {                        
            $import = $form->get('import')->getData();
            $originalFilename = pathinfo($import->getClientOriginalName(), PATHINFO_FILENAME);
            if ($import) {
                //call the handle service for upload
                $importDatas->upload($import);
                $this->addFlash('success', 'Import effectué avec succès');
            }
        }
        return $this->renderForm('import/index.html.twig', [
            'form' => $form,
        ]);
    }
}

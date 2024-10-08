<?php

namespace App\Controller;

use App\Repository\PainRepository; // Importez le repository
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;


use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Pain;


class PainController extends AbstractController
{
    #[Route('/pains', name: 'pain_index')]
    public function index(PainRepository $painRepository): Response // Injectez le repository
    {
        $pains = $painRepository->findAll(); // Vérifiez que cette ligne est présente

        return $this->render('pain/index.html.twig', [
            'pains' => $pains, // Vérifiez que la variable est bien nommée "pains"
        ]);
    }

    #[Route('/pain/create', name: 'pain_create')]
public function create(EntityManagerInterface $entityManager): Response
{
    $pain = new Pain();
    $pain->setName('Pain saigle'); // Exemple de valeur
    $entityManager->persist($pain);
    $entityManager->flush();
    return $this->render('pain/create.html.twig', [
        'pain' => $pain,
    ]);
}
}

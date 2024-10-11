<?php

namespace App\Controller;

use App\Repository\OignonRepository; // Importez le repository
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Oignon;


class OignonController extends AbstractController
{
    #[Route('/oignons', name: 'oignon_index')]
    public function index(OignonRepository $oignonRepository): Response // Injectez le repository
    {
        $oignons = $oignonRepository->findAll(); // Utilisez findAll()

        return $this->render('oignon/index.html.twig', [
            'oignons' => $oignons,
        ]);
    }

    #[Route('/oignon/create', name: 'oignon_create')]
public function create(EntityManagerInterface $entityManager): Response
{
    $oignon = new Oignon();
    $oignon->setName('Oignon rouge'); // Exemple de valeur
    $entityManager->persist($oignon);
    $entityManager->flush();
    return $this->render('oignon/create.html.twig', [
        'oignon' => $oignon,
    ]);
}
}

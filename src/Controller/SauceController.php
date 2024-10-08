<?php

namespace App\Controller;

use App\Repository\SauceRepository; // Importez le repository
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Sauce;


class SauceController extends AbstractController
{
    #[Route('/sauces', name: 'sauce_index')]
    public function index(SauceRepository $sauceRepository): Response // Injectez le repository
    {
        $sauces = $sauceRepository->findAll(); // Utilisez findAll()
        return $this->render('sauce/index.html.twig', [
            'sauces' => $sauces,
        ]);
    }


#[Route('/sauce/create', name: 'sauce_create')]
    public function create(EntityManagerInterface $entityManager): Response
    {
        $sauce = new Sauce();
        $sauce->setName('Sauce barbecue'); // Exemple de valeur
        $entityManager->persist($sauce);
        $entityManager->flush();
        return new Response('Sauce créée avec succès !');
    }
}

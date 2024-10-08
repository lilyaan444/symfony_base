<?php

namespace App\Controller;

use App\Repository\BurgerRepository; // Importez le repository
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Burger;


class BurgerController extends AbstractController
{
    #[Route('/burgers', name: 'burger_index')]
    public function index(BurgerRepository $burgerRepository): Response
    {
        // Récupérer tous les burgers
        $burgers = $burgerRepository->findAll();

        // Rendre la vue avec les burgers
        return $this->render('burger/index.html.twig', [
            'burgers' => $burgers,
        ]);
    }


    #[Route('/burger/create', name: 'burger_create')]
public function create(EntityManagerInterface $entityManager): Response
{
    $burger = new Burger();
    $burger->setName('Krabby Patty'); // Exemple de valeur
    $burger->setPrice(4.99); // Exemple de valeur
    // ... (autres propriétés du burger)
    $entityManager->persist($burger);
    $entityManager->flush();
    return new Response('Burger créé avec succès !');
}
}

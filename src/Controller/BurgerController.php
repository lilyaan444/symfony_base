<?php

namespace App\Controller;

use App\Repository\BurgerRepository; // Importez le repository
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Burger;
use App\Form\BurgerType;
use Symfony\Component\HttpFoundation\Request; // Add this line




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
    return $this->render('burger/create.html.twig', [
        'burger' => $burger,
    ]);
}

#[Route('/burger/new', name: 'burger_new')]
       public function new(Request $request, EntityManagerInterface $entityManager): Response
       {
           $burger = new Burger();
           $form = $this->createForm(BurgerType::class, $burger);
           $form->handleRequest($request);
           if ($form->isSubmitted() && $form->isValid()) {
               $entityManager->persist($burger);
               $entityManager->flush();
               $this->addFlash(
                   'success',
                   'Votre burger a été créé avec succès !'
               );
               return $this->redirectToRoute('burger_index');
           }
           return $this->render('burger/new.html.twig', [
               'form' => $form->createView(),
           ]);
       }

}

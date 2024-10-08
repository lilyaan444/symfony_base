<?php

namespace App\Controller;

use App\Repository\CommentaireRepository; // Importez le repository
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Commentaire;


class CommentaireController extends AbstractController
{
    #[Route('/commentaires', name: 'commentaire_index')]
    public function index(CommentaireRepository $commentaireRepository): Response // Injectez le repository
    {
        $commentaires = $commentaireRepository->findAll(); // Utilisez findAll()

        return $this->render('commentaire/index.html.twig', [
            'commentaires' => $commentaires,
        ]);
    }

#[Route('/commentaire/create', name: 'commentaire_create')]
public function create(EntityManagerInterface $entityManager): Response
{
    $commentaire = new Commentaire();
    $commentaire->setAuteur('John Doe'); // Exemple de valeur
    $commentaire->setContenu('Super burger !'); // Exemple de valeur
    $commentaire->setName("Premier"); // Associez le burger au commentaire
    // ... (autres propriétés du commentaire)
    $entityManager->persist($commentaire);
    $entityManager->flush();
    return new Response('Commentaire créé avec succès !');
}
}

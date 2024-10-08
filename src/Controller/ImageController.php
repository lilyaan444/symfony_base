<?php

namespace App\Controller;

use App\Repository\ImageRepository; // Importez le repository
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Image;


class ImageController extends AbstractController
{
    #[Route('/images', name: 'image_index')]
    public function index(ImageRepository $imageRepository): Response // Injectez le repository
    {
        $images = $imageRepository->findAll(); // Utilisez findAll()

        return $this->render('image/index.html.twig', [
            'images' => $images,
        ]);
    }

    #[Route('/image/create', name: 'image_create')]
public function create(EntityManagerInterface $entityManager): Response
{
    $image = new Image();
    $image->setUrl('image.jpg'); // Exemple de valeur
    $entityManager->persist($image);
    $entityManager->flush();
    return new Response('Image créée avec succès !');
}
}

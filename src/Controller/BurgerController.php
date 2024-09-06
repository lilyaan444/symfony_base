<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BurgerController extends AbstractController
{
    #[Route('/burgers', name: 'app_burgers_list')]
    public function list(): Response
    {
        return $this->render('burgers_list.html.twig');
    }

    #[Route('/burgers/{id}', name: 'show_burger')]
    public function show(int $id):  Response
    {
        // Simulation d'une base de données de burgers
        $burgers = [
            1 => [
                'name' => 'Le Classique',
                'description' => 'Steak haché, cheddar, tomate, oignon, salade',
                'price' => 9.99
            ],
            2 => [
                'name' => 'Le Veggie',
                'description' => 'Galette de légumes, cheddar vegan, tomate, oignon, salade',
                'price' => 10.99
            ],
            3 => [
                'name' => 'Le Spicy',
                'description' => 'Steak haché, cheddar, jalapeños, oignon rouge, sauce épicée',
                'price' => 11.99
            ],
        ];

        return $this->render('burger_show.html.twig', [
            'burger' => $burgers[$id]
        ]);
    }

}

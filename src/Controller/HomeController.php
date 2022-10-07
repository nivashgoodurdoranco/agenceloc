<?php

namespace App\Controller;

use App\Entity\Vehicle;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {

        $vehicles = $this->entityManager->getRepository(Vehicle::class)->findBy(
            array(),
            array('dateEnregistrement' => 'DESC'),
            3,
            0,
        );


        return $this->render('home/index.html.twig', [
            'vehicles' => $vehicles,
        ]);
    }
}

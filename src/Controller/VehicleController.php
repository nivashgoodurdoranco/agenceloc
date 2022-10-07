<?php

namespace App\Controller;

use App\Entity\Vehicle;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VehicleController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    #[Route('/vehicle/{id}', name: 'vehicle')]
    public function showVehicle($id): Response
    {
        $vehicle = $this->entityManager->getRepository(Vehicle::class)->find($id);

        return $this->render('vehicle/index.html.twig', [
            'vehicle' => $vehicle,
        ]);
    }

}

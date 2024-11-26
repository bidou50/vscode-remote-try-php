<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\ClientRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(EntityManagerInterface $manager,ClientRepository $clientRepository): Response
    {
        $test=1;

        $test++;

        $client=new Client();
        $client->setNom("andre");
        $client->setAge(23);
        $manager->persist($client);
        $manager->flush();
        
        $clients=$clientRepository->findAll();


        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
            'test'=>$test,
            'clients'=>$clients
        ]);
    }
}

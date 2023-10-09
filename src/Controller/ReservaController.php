<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Cliente;
use App\Form\ClienteType;
use App\Entity\Reserva;
use App\Form\ReservaType;

class ReservaController extends AbstractController
{
    #[Route('/reserva', name: 'reserva')]
    public function index(Request $request): Response
    {
        $cliente = new Cliente();
        $form = $this->createForm(ClienteType::class, $cliente);
        $form->handleRequest($request);
        
        if($form->isSubmitted()){
            $reserva = new Reserva();
            $form = $this->createForm(ReservaType::class, $reserva);
            return $this->render('reserva/reserva.html.twig',[
                'form_reserva' => $form->createView()
            ]);
        }

        return $this->render('reserva/cliente.html.twig',[
            'form_cliente' => $form->createView()
        ]);
    }
}

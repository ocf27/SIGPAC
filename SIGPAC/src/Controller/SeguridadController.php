<?php

namespace App\Controller;

use App\Entity\Empleados;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SeguridadController extends AbstractController
{
    public function index(Request $request)
    {
        $session = $request->getSession();
        if ($session->has('idUsuario')) {

            return $this->render('Administrativo/administrativo-home-page.html.twig');
        } else {
            return $this->redirectToRoute('sigpac_login');
        }
    }

    public function login(Request $request, EntityManagerInterface $entityManager)
    {
        $session = $request->getSession();
        if ($session->has('idUsuario')) {
            return $this->redirectToRoute('sigpac_home');
        } else {
            if ($request->getMethod() == 'POST') {
                //$session->set("idUsuario", "PRUEBA");
                $username = $request->get('u');
                $password = $request->get('p');

                $empleado = $entityManager->getRepository(Empleados::class)
                    ->findOneBy(['username' => $username, 'password' => $password]);

                if ($empleado != null) {
                    if ($empleado->getUsername() == $username & $empleado->getPassword() == $password) {
                        $bandera = true;
                        $session->set('idUsuario', $empleado->getIdentificador());
                        $session->set('rol', $empleado->getCveRol()->getClave());
                        $session->set('desRol', $empleado->getCveRol()->getDescripcion());
                        $session->set('nombreUsuario', $empleado->getNomEmp());
                        $session->set('paUsuario', $empleado->getPriApe());
                        $session->set('saUsuario', $empleado->getSegApe());
                    } else {
                        $bandera = false;
                    }
                } else {
                    $bandera = false;
                }

                $response = new Response($bandera, 200);

                return $response;

            } else { // ES GET
                //$session->set("idUsuario", "PRUEBA");

                return $this->render('Seguridad/seguridad-login.html.twig');
            }

        }
    }

    public function logout(Request $request)
    {
        $session = $request->getSession();
        $session->clear();

        return $this->redirectToRoute('sigpac_login');
    }
}
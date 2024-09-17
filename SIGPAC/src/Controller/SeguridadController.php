<?php

namespace App\Controller;

use App\Entity\Alumnos;
use App\Entity\CatalogoRoles;
use App\Entity\Empleados;
use App\Entity\Matricula;
use App\Entity\Pagos;
use App\Entity\SolicitudPagos;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SeguridadController extends AbstractController
{
    public function index(Request $request, EntityManagerInterface $entityManager)
    {
        $session = $request->getSession();
        if ($session->has('idUsuario')) {
            $render = "";
            switch ($session->get('rol')) {
                case 1:
                    $idEmpleado = $entityManager->getRepository(Empleados::class)
                        ->findOneBy(['identificador' => $session->get('idUsuario')]);
                    $solicitudes = $entityManager->getRepository(SolicitudPagos::class)
                        ->findBy(['cveEmp' => $idEmpleado]);
                    $render = $this->render('Administrativo/administrativo-home-page.html.twig',
                        ['solicitudes' => $solicitudes]
                    );
                    break;
                case 6:
                    $alumno = $entityManager->getRepository(Alumnos::class)
                        ->findOneBy(['curp' => $session->get('idUsuario')]);
                    $solicitudes = $entityManager->getRepository(SolicitudPagos::class)
                        ->findBy(['cveAlu' => $alumno]);
                    $matricula = $entityManager->getRepository(Matricula::class)
                        ->findOneBy(['cveAlu' => $alumno]);
                    $planPagos = $entityManager->getRepository(Pagos::class)
                        ->findBy(['cveMat' => $matricula]);
                    $dql = "SELECT p "
                        . "FROM "
                        . "App\Entity\Pagos p "
                        . "WHERE "
                        . "p.idPago NOT IN( SELECT IDENTITY(sp.cvePag) FROM App\Entity\SolicitudPagos sp WHERE sp.cveAlu = " . $alumno->getIdAlu() . ") "
                        . "AND "
                        . "p.cveMat = " . $matricula->getIdMat();
                    $query = $entityManager->createQuery($dql);
                    $pagosPendientes = $query->getResult();

                    $render = $this->render('Alumno/alumno-home-page.html.twig',
                        [
                            'solicitudes' => $solicitudes,
                            'planPagos' => $planPagos,
                            'pagosPendientes' => $pagosPendientes
                        ]
                    );
                    break;
                default:
                    break;
            }

            return $render;
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
                    /*
                     * BUSCAR COMO ALUMNO
                     */
                    $alumno = $entityManager->getRepository(Alumnos::class)
                        ->findOneBy(['username' => $username, 'password' => $password]);
                    if ($alumno != null) {
                        $bandera = true;
                        $session->set('idUsuario', $alumno->getCurp());
                        $session->set('rol', 6);
                        $session->set('desRol', 'ALUMNO');
                        $session->set('nombreUsuario', $alumno->getNomAlu());
                        $session->set('paUsuario', $alumno->getPriApe());
                        $session->set('saUsuario', $alumno->getSegApe());
                    } else {
                        $bandera = false;
                    }

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
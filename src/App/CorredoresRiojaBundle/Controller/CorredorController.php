<?php

namespace App\CorredoresRiojaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class CorredorController extends Controller {

    public function mostrarCarrerasFuturasAction() {
        $carreras = $this->get("carrerarepository")->listarCarrerasFuturas();        
        return $this->render('AppCorredoresRiojaBundle:views:portada.html.twig',array('carrerasFuturas'=> $carreras));
    }

    public function mostrarTodasAction() {
        $carrerasDisputadas = $this->get("carrerarepository")->listarCarrerasDisputadas();
        $carrerasFuturas = $this->get("carrerarepository")->listarCarrerasFuturas();
        return $this->render('AppCorredoresRiojaBundle:views:carrera.html.twig',array('carrerasFuturas'=> $carrerasFuturas, 'carrerasDisputadas' => $carrerasDisputadas));
    }

    public function mostrarCarreraAction($slug) {
        $carrera = $this->get("carrerarepository")->buscarCarreraPorSlug($slug);        
        
        if ($carrera != NULL){
            return new Response($carrera);
        }else{
            return new Response('<html><body><p>No existe esa carrera</p></body></html>');
        }
    }

    public function mostrarMisCarrerasAction() {

        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        $user = $this->getUser();

        $corredor = $this->get("corredorrepository")->buscarCorredorPorDNI($user->getUsername());
        $carrerasDisputadas = $this->get("participanterepository")->listarCarrerasDisputadasDeCorredor($corredor);
        $carrerasFuturas = $this->get("participanterepository")->listarCarrerasFuturasDeCorredor($corredor);

        return $this->render('AppCorredoresRiojaBundle:views:miscarreras.html.twig', array('corredor' => $corredor, 'carrerasFuturas' => $carrerasFuturas, 'carrerasDisputadas' => $carrerasDisputadas));
    }
    
    public function inscribirCarreraAction($slug){
        
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        $user = $this->getUser();

        $corredor = $this->get("corredorrepository")->buscarCorredorPorDNI($user->getUsername());        
        $carrera = $this->get("carrerarepository")->buscarCarreraPorSlug($slug);
        $this->get("participanterepository")->inscribirCorredorEnCarrera($corredor, $carrera);
        
        $carrerasDisputadas = $this->get("participanterepository")->listarCarrerasDisputadasDeCorredor($corredor);
        $carrerasFuturas = $this->get("participanterepository")->listarCarrerasFuturasDeCorredor($corredor);

        return $this->render('AppCorredoresRiojaBundle:views:miscarreras.html.twig', array('corredor' => $corredor, 'carrerasFuturas' => $carrerasFuturas, 'carrerasDisputadas' => $carrerasDisputadas));        
    }    
    
    public function desapuntarCarreraAction($slug){
        
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        $user = $this->getUser();

        $corredor = $this->get("corredorrepository")->buscarCorredorPorDNI($user->getUsername());        
        $carrera = $this->get("carrerarepository")->buscarCarreraPorSlug($slug);
        $this->get("participanterepository")->eliminarParticipante($corredor, $carrera);
        
        $carrerasDisputadas = $this->get("participanterepository")->listarCarrerasDisputadasDeCorredor($corredor);
        $carrerasFuturas = $this->get("participanterepository")->listarCarrerasFuturasDeCorredor($corredor);

        return $this->render('AppCorredoresRiojaBundle:views:miscarreras.html.twig', array('corredor' => $corredor, 'carrerasFuturas' => $carrerasFuturas, 'carrerasDisputadas' => $carrerasDisputadas));        
    }

    public function listarCorredoresAction() {
        
        $corredores = $this->get("corredorrepository")->listarCorredores();
        var_dump($corredores);
        return $this->render('AppCorredoresRiojaBundle:views:listacorredores.html.twig',array('corredores'=> $corredores));
        
    }
}


//crear carreras en repositorio memoryParticipante para listar las del corredor
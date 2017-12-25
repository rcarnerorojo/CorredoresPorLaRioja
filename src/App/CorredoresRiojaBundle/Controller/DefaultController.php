<?php

namespace App\CorredoresRiojaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use App\CorredoresRiojaBundle\Form\CorredorType;

class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('AppCorredoresRiojaBundle:Default:index.html.twig');
    }

    public function registroAction(Request $peticion) {
        $form = $this->createForm(CorredorType::class);
        $form->handleRequest($peticion);
        if ($form->isValid()) {
            // Recogemos el corredor que se ha registrado
            $corredor = $form->getData();
            // Codificamos la contraseña del corredor
            $encoder = $this->get('security.encoder_factory')->getEncoder($corredor);
            $password = $encoder->encodePassword($corredor->getPassword(), $corredor->getSalt());
            $corredor->saveEncodedPassword($password);
            // Lo almacenamos en nuestro repositorio de corredores
            $this->get('corredorrepository')->registrarCorredor($corredor);
            // Creamos un mensaje flash para mostrar al usuario que 
            // se ha registrado correctamente
            $this->get('session')->getFlashBag()->add('info', '¡Enhorabuena, ' . $corredor->getNombre() . ' te has registrado en CorredoresPorLaRioja!');
            // Reedirigimos al usuario a la portada
            return $this->redirect($this->generateUrl('app_corredores_rioja_portada'));
        }
        return $this->render("AppCorredoresRiojaBundle:views:registro.html.twig", array('formulario' => $form->createView()));
    }

}

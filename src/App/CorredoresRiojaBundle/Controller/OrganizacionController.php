<?php

namespace App\CorredoresRiojaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class OrganizacionController extends Controller {
    
    public function mostrarOrganizacionAction($slug) {
        $organizacion = $this->get("organizacionrepository")->buscarOrganizacionPorSlug($slug);        
        
        if ($organizacion != NULL){
            return new Response($organizacion);
        }else{
            return new Response('<html><body><p>No existe esa organización</p></body></html>');
        }
    }     
    
}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\CorredoresRiojaInfrastructure\InMemoryRepository;
use App\CorredoresRiojaDomain\Repository\IOrganizacionRepository;
use App\CorredoresRiojaDomain\Model\Organizacion;
use App\Utils\Utils;

/**
 * Description of InMemoryOrganizacionRepository
 *
 * @author Ramón Mª Carnero
 */
class InMemoryOrganizacionRepository implements IOrganizacionRepository{

    private $organizaciones;
    
    public function __construct() {
        
       //$this->organizaciones = array();
       $this->organizaciones[] = new Organizacion(1, "Primera organizacion", "La organizacion", "org1@org.org", "1234");
    }

    public function actualizarOrganizacion(Organizacion $organizacion) {
        
        foreach ($this->organizaciones as $auxOrganizacion) {
            if ($auxOrganizacion->getId() == $organizacion->getId()){
                $this->eliminarOrganizacion($auxOrganizacion);
                $this->registrarOrganizacion($organizacion);
                break;
            }
        }

    }

    public function buscarOrganizacionPorEmail(string $email) {
        
        $resultOrganizacion = NULL;        
        
        foreach ($this->organizaciones as $auxOrganizacion) {
            
            if ($auxOrganizacion->getEmail() == $email){
                $resultOrganizacion = $auxOrganizacion;
                break;
            }
        }
        
        return $resultOrganizacion;        
    }

    public function buscarOrganizacionPorSlug(string $slug) {

        $resultOrganizacion = NULL;        
        $slug = Utils::getSlug($slug);
        
        foreach ($this->organizaciones as $auxOrganizacion) {
            
            if ($auxOrganizacion->getSlug() == $slug){
                $resultOrganizacion = $auxOrganizacion;
                break;
            }
        }
        
        return $resultOrganizacion;
    }

    public function eliminarOrganizacion(Organizacion $organizacion) {

        foreach (array_keys($this->organizaciones, $organizacion) as $key){
            unset($this->organizaciones[$key]);
        }        
    }

    public function listarOrganizaciones(): array {        
        return $this->organizaciones;
    }

    public function registrarOrganizacion(Organizacion $organizacion) {
        $this->organizaciones[] = $organizacion;
    }

}

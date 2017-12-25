<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InMemoryCarreraRepository
 *
 * @author Ramón Mª Carnero
 */

namespace App\CorredoresRiojaInfrastructure\InMemoryRepository;
use App\CorredoresRiojaDomain\Model\Carrera;
use App\CorredoresRiojaDomain\Model\Organizacion;
use App\CorredoresRiojaDomain\Repository\ICarreraRepository;
use Symfony\Component\Validator\Constraints\DateTime;
use App\Utils\Utils;

class InMemoryCarreraRepository implements ICarreraRepository{
    
    private $carreras;
    
    public function __construct() {
        
        $auxOrganizacion = new Organizacion(1, "Primera organizacion", "La organizacion", "org1@org.org", "1234");
        
        $fechaPasada = new \DateTime("yesterday");
        $fechaFutura = new \DateTime("tomorrow");
                
        //$this->carreras = array();
        $this->carreras[] = new Carrera(1, "Primera carrera", "Gran primera carrera", $fechaPasada, 11, $fechaPasada, 40, "", $auxOrganizacion);
        $this->carreras[] = new Carrera(2, "Segunda carrera", "Gran segunda carrera", $fechaFutura, 11, $fechaFutura, 40, "", $auxOrganizacion);
    }
    
    public function actualizarCarrera(Carrera $carrera) {
     
        foreach ($this->carreras as $auxCarrera) {
            if ($auxCarrera->getId() == $carrera->getId()){
                $this->eliminarCarrera($auxCarrera);
                $this->añadirCarrera($carrera);
                break;
            }
        }

    }

    public function añadirCarrera(Carrera $carrera) {
        $this->carreras[] = $carrera;
    }

    public function buscarCarreraPorSlug(string $slug) {
        
        $resultCarrera = NULL;        
        $slug = Utils::getSlug($slug);
        
        foreach ($this->carreras as $auxCarrera) {
            
            if ($auxCarrera->getSlug() == $slug){
                $resultCarrera = $auxCarrera;
                break;
            }
        }
        
        return $resultCarrera;
    }

    public function buscarCarrerasDisputadasDeOrganizacion(Organizacion $organizacion): array {
        
        $carrerasDisputadas = array();
        
        foreach ($this->carreras as $auxCarrera) {
            if (($auxCarrera->getOrganizacion() == $organizacion)&&($auxCarrera->getFechaCelebracion()<DateTime())){
                $carrerasDisputadas[] = $auxCarrera;
            }
        }
                
        return $carrerasDisputadas;
    }

    public function buscarCarrerasFuturasDeOrganizacion(Organizacion $organizacion): array {
        
        $carrerasFuturas = array();
        
        foreach ($this->carreras as $auxCarrera) {
            if (($auxCarrera->getOrganizacion() == $organizacion)&&($auxCarrera->getFechaCelebracion()>DateTime())){
                $carrerasFuturas[] = $auxCarrera;
            }
        }
        
        return $carrerasFuturas;
    }

    public function eliminarCarrera(Carrera $carrera) {
        
        foreach (array_keys($this->carreras, $carrera) as $key){
            unset($this->carreras[$key]);
        }
    }

    public function listarCarreras(): array {
        return $this->carreras;
    }

    public function listarCarrerasDisputadas(): array {
        
        $carrerasDisputadas = array();
        
        foreach ($this->carreras as $auxCarrera) {
            if ($auxCarrera->getFechaCelebracion() < new \DateTime()){
                $carrerasDisputadas[] = $auxCarrera;                
            }
        }
        
        return $carrerasDisputadas;
    }

    public function listarCarrerasFuturas(): array {
        
        $carrerasFuturas = array();
        
        foreach ($this->carreras as $auxCarrera) {
            if ($auxCarrera->getFechaCelebracion() > new \DateTime()){
                $carrerasFuturas[] = $auxCarrera;                
            }
        }
        
        return $carrerasFuturas;
    }

}

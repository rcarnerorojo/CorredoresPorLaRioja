<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\CorredoresRiojaInfrastructure\InMemoryRepository;
use App\CorredoresRiojaDomain\Repository\IParticipanteRepository;
use App\CorredoresRiojaDomain\Model\Organizacion;
use App\CorredoresRiojaDomain\Model\Participante;
use App\CorredoresRiojaDomain\Model\Corredor;
use App\CorredoresRiojaDomain\Model\Carrera;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Description of InMemoryParticipanteRepository
 *
 * @author Ramón Mª Carnero
 */
class InMemoryParticipanteRepository implements IParticipanteRepository{
    
    private $participantes;
    
    function __construct() {
        
        $this->participantes = array();
        
        $corredor = new Corredor("1234", "Ramon", "Carnero", "ramon@aaa.com", 1234, "mi casa", NULL);
        
        $auxOrganizacion = new Organizacion(1, "Primera organizacion", "La organizacion", "org1@org.org", "1234");
        
        $fechaPasada = new \DateTime("yesterday");
        $fechaFutura = new \DateTime("tomorrow");
                
        $carreraPasada = new Carrera(1, "Primera carrera", "Gran primera carrera", $fechaPasada, 11, $fechaPasada, 40, "", $auxOrganizacion);
        $carreraFutura = new Carrera(2, "Segunda carrera", "Gran segunda carrera", $fechaFutura, 11, $fechaFutura, 40, "", $auxOrganizacion);
                
        $this->participantes[] = new Participante($corredor, $carreraPasada);
        $this->participantes[] = new Participante($corredor, $carreraFutura);
    }

    public function actualizarTiempoCorredorEnCarrera(DateTime $tiempo, Corredor $corredor, Carrera $carrera) {
        
        foreach ($this->participantes as $auxParticipante) {
            if (($auxParticipante->getCorredor() == $corredor)&&($auxParticipante->getCarrera() == $carrera)){
                $auxParticipante->asignarMarca($tiempo);
            }
        }        
    }

    public function eliminarParticipante(Corredor $corredor, Carrera $carrera) {

        foreach ($this->participantes as $key=>$auxParticipante){
            
            if (($auxParticipante->getCorredor() == $corredor)&&($auxParticipante->getCarrera() == $carrera)){
                unset($this->participantes[$key]);
            }
        }

    }

    public function estaIncritoCorredorEnCarrera(Corredor $corredor, Carrera $carrera) {
        
        $inscrito = false;
        
        foreach ($this->participantes as $auxParticipante) {
            if (($auxParticipante->getCorredor() == $corredor)&&($auxParticipante->getCarrera() == $carrera)){
                $inscrito = true;
            }
        }
                
        return $inscrito;         
    }

    public function inscribirCorredorEnCarrera(Corredor $corredor, Carrera $carrera) {
        
        $this->participantes[] = new Participante($corredor, $carrera);
    }

    public function listarCarrerasDisputadasDeCorredor(Corredor $corredor): array {
        
        $carreras = array();
        
        foreach ($this->participantes as $auxParticipante) {
            $auxCarrera = $auxParticipante->getCarrera();
            $ahora = new \DateTime();
            if (($auxParticipante->getCorredor() == $corredor)&&($auxCarrera->getFechaCelebracion()<$ahora)){
                $carreras[] = $auxParticipante->getCarrera();
            }
        }
                
        return $carreras;          
    }

    public function listarCarrerasFuturasDeCorredor(Corredor $corredor): array {
        
        $carreras = array();
        
        foreach ($this->participantes as $auxParticipante) {
            $auxCarrera = $auxParticipante->getCarrera();
            $ahora = new \DateTime();
            if (($auxParticipante->getCorredor() == $corredor)&&($auxCarrera->getFechaCelebracion()>$ahora)){
                $carreras[] = $auxParticipante->getCarrera();
            }
        }
                
        return $carreras;        
    }

    public function listarParticipantes(): array {
        return $this->participantes;
    }

    public function listarParticipantesDeCarrera(Carrera $carrera): array {

        $participantes = array();
        
        foreach ($this->participantes as $auxParticipante) {
            if ($auxParticipante->getCarrera() == $carrera){
                $participantes[] = $auxParticipante;
            }
        }
                
        return $participantes;
    }

}

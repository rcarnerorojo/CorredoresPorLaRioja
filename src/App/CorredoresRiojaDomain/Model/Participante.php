<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Participante
 *
 * @author Ramón Mª Carnero
 */

namespace App\CorredoresRiojaDomain\Model;
use App\CorredoresRiojaDomain\Model\Corredor;
use App\CorredoresRiojaDomain\Model\Carrera;


class Participante {

    private $corredor;
    private $carrera;
    private $dorsal;
    private $tiempo;

    function __construct(Corredor $corredor, Carrera $carrera) {
        $this->corredor = $corredor;
        $this->carrera = $carrera;
        $this->dorsal = rand(1, 100);
        $this->tiempo = 0;
    }

    function getCorredor() {
        return $this->corredor;
    }

    function getCarrera() {
        return $this->carrera;
    }

    function getDorsal() {
        return $this->dorsal;
    }

    function getTiempo() {
        return $this->tiempo;
    }

    function asignarMarca($tiempo) {
        $this->tiempo = $tiempo;
    }

    public function __toString() {
        return "Corredor: " . $this->corredor . " Carrera:" . $this->carrera . ".\nDosal: " . $this->dorsal . "Tiempo: " . $this->tiempo;
    }

}

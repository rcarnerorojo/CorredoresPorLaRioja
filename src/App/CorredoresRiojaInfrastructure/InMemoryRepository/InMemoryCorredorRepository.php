<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\CorredoresRiojaInfrastructure\InMemoryRepository;

use App\CorredoresRiojaDomain\Repository\ICorredorRepository;
use App\CorredoresRiojaDomain\Model\Corredor;

/**
 * Description of InMemoryCorredorRepository
 *
 * @author Ramón Mª Carnero
 */
class InMemoryCorredorRepository implements ICorredorRepository {

    private $corredores;

    function __construct() {

//        $this->corredores = array();      
        $this->corredores[] = new Corredor("1234", "Ramon", "Carnero", "ramon@aaa.com", 1234, "mi casa", NULL);
    }

    public function actualizarCorredor(Corredor $corredor) {

        foreach ($this->corredores as $auxCorredor) {
            if ($auxCorredor->getEmail() == $corredor->getEmail()) {
                $this->eliminarCorredor($auxCorredor);
                $this->registrarCorredor($corredor);
                break;
            }
        }
    }

    public function buscarCorredorPorDNI(string $dni) {

        $resultCorredor = NULL;
        foreach ($this->corredores as $auxCorredor) {
            if ($auxCorredor->getDni() == $dni) {
                $resultCorredor = $auxCorredor;
                break;
            }
        }

        return $resultCorredor;
    }

    public function eliminarCorredor(Corredor $corredor) {

        foreach (array_keys($this->corredores, $corredor) as $key) {
            unset($this->corredores[$key]);
        }
    }

    public function listarCorredores(): array {
        return $this->corredores;
    }

    public function registrarCorredor(Corredor $corredor) {
        $this->corredores[] = $corredor;
    }

}

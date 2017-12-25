<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Ramón Mª Carnero
 */

namespace App\CorredoresRiojaDomain\Repository;

use App\CorredoresRiojaDomain\Model\Corredor;

interface ICorredorRepository {

    public function registrarCorredor(Corredor $corredor);

    public function actualizarCorredor(Corredor $corredor);

    public function eliminarCorredor(Corredor $corredor);

    public function buscarCorredorPorDNI(string $dni);

    public function listarCorredores(): array;
}

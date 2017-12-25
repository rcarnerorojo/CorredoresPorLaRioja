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

use App\CorredoresRiojaDomain\Model\Carrera;
use App\CorredoresRiojaDomain\Model\Organizacion;

interface ICarreraRepository {

    public function añadirCarrera(Carrera $carrera);

    public function actualizarCarrera(Carrera $carrera);

    public function eliminarCarrera(Carrera $carrera);

    public function buscarCarreraPorSlug(string $slug);

    public function buscarCarrerasDisputadasDeOrganizacion(Organizacion $organizacion): array;

    public function buscarCarrerasFuturasDeOrganizacion(Organizacion $organizacion): array;

    public function listarCarreras(): array;

    public function listarCarrerasDisputadas(): array;

    public function listarCarrerasFuturas(): array;
}

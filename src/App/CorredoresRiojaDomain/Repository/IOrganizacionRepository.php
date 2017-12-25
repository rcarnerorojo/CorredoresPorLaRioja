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

use App\CorredoresRiojaDomain\Model\Organizacion;

interface IOrganizacionRepository {

    public function registrarOrganizacion(Organizacion $organizacion);

    public function actualizarOrganizacion(Organizacion $organizacion);

    public function eliminarOrganizacion(Organizacion $organizacion);

    public function buscarOrganizacionPorSlug(string $slug);

    public function buscarOrganizacionPorEmail(string $email);

    public function listarOrganizaciones(): array;
}

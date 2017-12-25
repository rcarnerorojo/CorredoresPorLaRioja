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

use App\CorredoresRiojaDomain\Model\Participante;
use App\CorredoresRiojaDomain\Model\Corredor;
use App\CorredoresRiojaDomain\Model\Carrera;
use Symfony\Component\Validator\Constraints\DateTime;


interface IParticipanteRepository {

    public function inscribirCorredorEnCarrera(Corredor $corredor, Carrera $carrera);

    public function listarParticipantes(): array;

    public function listarParticipantesDeCarrera(Carrera $carrera): array;

    public function listarCarrerasDisputadasDeCorredor(Corredor $corredor): array;

    public function listarCarrerasFuturasDeCorredor(Corredor $corredor): array;

    public function estaIncritoCorredorEnCarrera(Corredor $corredor, Carrera $carrera);

    public function actualizarTiempoCorredorEnCarrera(DateTime $tiempo, Corredor $corredor, Carrera $carrera);

    public function eliminarParticipante(Corredor $corredor, Carrera $carrera);
}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Carrera
 *
 * @author Ramón Mª Carnero
 */

namespace App\CorredoresRiojaDomain\Model;
use App\CorredoresRiojaDomain\Model\Organizacion;
use App\Utils\Utils;

class Carrera {
    
    private $id;
    private $nombre;
    private $descripcion;
    private $fechaCelebracion;
    private $distancia;
    private $fechaLimiteInscripcion;
    private $numeroMaximoParticipantes;
    private $imagen;
    private $slug;
    private $organizacion;
    
    function __construct($id, $nombre, $descripcion, $fechaCelebracion, $distancia, $fechaLimiteInscripcion, $numeroMaximoParticipantes, $imagen, Organizacion $organizacion) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->fechaCelebracion = $fechaCelebracion;
        $this->distancia = $distancia;
        $this->fechaLimiteInscripcion = $fechaLimiteInscripcion;
        $this->numeroMaximoParticipantes = $numeroMaximoParticipantes;
        $this->imagen = $imagen;
        $this->organizacion = $organizacion;
        $this->slug = Utils::getSlug($this->nombre);
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFechaCelebracion() {
        return $this->fechaCelebracion;
    }

    function getDistancia() {
        return $this->distancia;
    }

    function getFechaLimiteInscripcion() {
        return $this->fechaLimiteInscripcion;
    }

    function getNumeroMaximoParticipantes() {
        return $this->numeroMaximoParticipantes;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getSlug() {
        return $this->slug;
    }

    function getOrganizacion() {
        return $this->organizacion;
    }

    public function __toString() {
        return "Carrera: ".$this->nombre." ".$this->descripcion.". Fecha: ".$this->fechaCelebracion->format('d/m/Y')."<br>".$this->organizacion;
    }
}


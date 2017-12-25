<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Organizacion
 *
 * @author Ramón Mª Carnero
 */

namespace App\CorredoresRiojaDomain\Model;
use App\Utils\Utils;

class Organizacion {
    
    private $id;
    private $nombre;
    private $descripcion;
    private $email;
    private $password;
    private $salt;
    private $slug;
    
    function __construct($id, $nombre, $descripcion, $email, $password) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->email = $email;
        $this->password = $password;
        $this->salt = "";
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

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getSalt() {
        return $this->salt;
    }

    function getSlug() {
        return $this->slug;
    }

    public function __toString() {
        return "Organización: ".$this->nombre." ".$this->descripcion.". Correo: ".$this->email;
    }
    
}

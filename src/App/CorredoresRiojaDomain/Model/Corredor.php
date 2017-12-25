<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Corredor
 *
 * @author Ramón Mª Carnero
 */

namespace App\CorredoresRiojaDomain\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Corredor {
    
    private $dni;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $salt;
    private $direccion;
    private $fechanacimiento;
    
    function __construct($dni, $nombre, $apellidos, $email, $password, $direc, $fecha) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->password = $password;
        $this->direccion = $direc;
        $this->fechanacimiento = $fecha;
        $this->salt = "";
    }

    function getDni() {
        return $this->dni;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
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

    function getDireccion() {
        return $this->direccion;
    }

    function getFechaNacimiento() {
        return $this->fechanacimiento;
    }

    public function __toString() {
        return "Corredor: ".$this->nombre." ".$this->apellidos.". Correo: ".$this->email;
    }

    public function saveEncodedPassword($encodedPassword) {
        $this->password = $encodedPassword;
    }
    
    /**
     * @Assert\IsTrue(message = "La contraseña no puede ser la misma que tu nombre")
     */
    public function isPasswordLegal() {
        return $this->nombre != $this->password;
    }

    /**
     * @Assert\IsTrue(message = "Tienes que ser mayor de edad para registrarte")
     */
    public function isMayorEdad() {
        $currentyear = getdate()['year'];
        $birthdayyear = ($this->fechanacimiento->format('Y'));
        $diff_years = ($currentyear - $birthdayyear);
        return $diff_years >= 18;
    }
    
}

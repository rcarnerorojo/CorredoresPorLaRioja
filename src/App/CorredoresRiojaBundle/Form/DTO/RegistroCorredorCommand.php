<?php

/**
 * Description of RegistroCorredorCommand
 *
 * @author Ramón Mª Carnero
 */

namespace App\CorredoresRiojaBundle\Form\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class RegistroCorredorCommand {

    /**
     * @Assert\NotBlank()
     */
    private $dni;

    /**
     * @Assert\NotBlank()
     */
    private $nombre;

    /**
     * @Assert\NotBlank()
     */
    private $apellidos;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @Assert\NotBlank()
     */
    private $password;

    /**
     * @Assert\NotBlank()    
     * @Assert\Date()
     */
    private $fechanacimiento;

    /**
     * @Assert\NotBlank()
     */
    private $direccion;

    public function getDni() {
        return $this->dni;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getFechanacimiento() {
        return $this->fechanacimiento;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setFechanacimiento($fechanacimiento) {
        $this->fechanacimiento = $fechanacimiento;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

}

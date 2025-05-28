<?php
class Coneccion{
    private $servidor= "localhost";
    private $user="root";
    private $password= "";  
    private $baseDatos="basedatos";
    private $coneccion;

    public function __construct(){
        $this->coneccion = new mysqli($this->servidor,$this->user,$this->password,$this->baseDatos); 
        if($this->coneccion->connect_error){
            die("la conexion fallo: ".$this->coneccion->connect_error);
        }

    }

    public function getConeccio(){
        return $this->coneccion;
    }
}

?>
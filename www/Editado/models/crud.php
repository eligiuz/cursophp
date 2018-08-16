<?php

require_once "models/conexion.php";

class Datos extends Conexion{
    /*REGISTRO DE USUARIOS
    --------------------*/
    public function registroUsuarioModel($datosModel, $tabla){

        $stmt = Conexion::conectar()->prepare();

    }
}

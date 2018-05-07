<?php

//EXTENSION DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

require_once "conexion.php";

class Datos extends Conexion{

    // REGISTRO DE USUARIOS

    public function registroUsuarioModel($datosModel,$tabla){

        //prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales seran sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, password, email) VALUES (:usuario,:password,:email)");

        //bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

        $stmt-> bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
        $stmt-> bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
        $stmt-> bindParam(":email", $datosModel["email"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "success";
        } else {
            return "error";
        }

    }

    // INGRESO USUARIO
    // ---------------------------

    public function ingresoUsuarioModel($datosModel, $tabla){

        $stmt = Conexion::conectar()->prepare("SELECT usuario, password FROM $tabla WHERE usuario = :usuario");
        $stmt-> bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
        $stmt->execute();

        // fetch: Obtienen una fila de un conjunto de resultados asociados al objeto PDOStatement.
        return $stmt->fetch();

    }

    // VISTA USUARIO
    // ---------------------------

    public function vistaUsuariosModel($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT id, usuario, password, email FROM $tabla");
        $stmt->execute();

        //fetchAll() Obtiene todas las filas de un conjunto de resultados asociados al objeto PDOStatement.
        return $stmt->fetchAll();

    }

}
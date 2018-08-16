<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=cursophp","root","tiger");
        var_dump($link);

	}
}

$a = new Conexion();
$a -> conectar();

?>

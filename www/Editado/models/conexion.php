<?php

class Conexion{

	public function conectar(){
/*En este caso el host es el contenedor en el cual tengo mysql*/
		// $link = new PDO("mysql:host=tnb-mysql;dbname=cursophp","root","tiger");
        $link = new PDO("mysql:host=tnb-mysql;dbname=cursophp","root","tiger");
        return $link;

	}
}


?>

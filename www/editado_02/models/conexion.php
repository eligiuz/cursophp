<?php

class Conexion{
    public function conectar(){
        $link = new PDO("mysql:host=tnb-mysql;dbname=cursophp","root","tiger");
        return $link;
    }
}

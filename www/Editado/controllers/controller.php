<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/template.php";
	
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}

	/*REGISTRO DE USUARIOS
	-------------------------------*/
	public function registroUsuarioController(){

		if(isset($_POST["usuarioRegistro"])){

			$datosController = array("usuario"=>$_POST["usuarioRegistro"],
						   "password"=>$_POST["passwordRegistro"],
						   "email"=>$_POST["emailRegistro"]);

			$respuesta = Datos::registroUsuarioModel($datosController,"usuarios");

			if ($respuesta == "success") {
				/*Para evitar el error de header */
				echo '<script>window.location="index.php?action=ok"</script>';
			} else {
				echo '<script>window.location="index.php"</script>';
			}

		}

	}

	// INGRESO DE USUARIOS
	// ----------------------------------------------
	public function ingresoUsuarioController(){

		if (isset($_POST["usuarioIngreso"])) {
			
			$datosController = array("usuario"=>$_POST["usuarioIngreso"],
						   "password"=>$_POST["passwordIngreso"]);

			$respuesta = Datos::ingresoUsuarioModel($datosController,"usuarios");

			echo $respuesta;
		}
	}

}


?>
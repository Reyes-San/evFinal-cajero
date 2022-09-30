
<?php
	//session_start();
    //var_dump($_POST);
    include('../models/cliente.php');
    $clienteRut = $_POST["clienteRut"];
	$clientePassword = $_POST["clientePassword"];
	
	$verificacion=true;
	if($clienteRut=="")
	{
		echo "-Ingrese su rut<br>";
		$verificacion=false;
	}
	if($clientePassword=="")
	{
		echo "-Ingrese su password.<br>";
		$verificacion=false;
	}
	
	
	if($verificacion==true)
	{
		$array_login_cliente=Cliente::get_login_cliente($clienteRut,$clientePassword);
		if(empty($array_login_cliente))
		{
			echo "false";
		}
		else
		{
			foreach ($array_login_cliente as $cliente)
			{
				$_SESSION["clienteRut"]=$cliente->clienteRut;
				$_SESSION["clienteNombre"]=$cliente->clienteNombre;
				$_SESSION["clientePassword"]=$cliente->clientePassword;
				$_SESSION["clienteMonto"]=$cliente->clienteMonto;
				echo "true";
				var_dump($_SESSION);
			}
		}
	}
	else
	{
		//echo "Error al iniciar sesion el cliente";
	}
	
?>
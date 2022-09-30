
<?php
	//session_start();
    //var_dump($_POST);
    include('../models/cliente.php');
    $clienteRut = $_POST["clienteRut"];
	$clientePassword = $_POST["clientePassword"];
	$clienteNombre = $_POST["clienteNombre"];
	$clienteMonto = $_POST["clienteMonto"];
	
	$verificacion=true;
	if($clienteRut=="")
	{
		echo "ingrese su rut";
		$verificacion=false;
	}
	if($clienteNombre=="")
	{
		echo "-Ingrese su nombre.<br>";
		$verificacion=false;
	}
	if($clienteMonto=="")
	{
		echo "-Ingrese el monto inicial.<br>";
		$verificacion=false;
	}
	if(is_numeric($clienteMonto)==false)
	{
		echo "-El monto debe ser solo numeros.<br>";
		$verificacion=false;
	}
	
	if($verificacion==true)
	{
		$cliente= new Cliente($clienteRut,$clienteNombre,$clientePassword,$clienteMonto);
		Cliente::register_cliente($cliente);
	}
	else
	{
		echo "No se ha registrado el cliente";
	}
	
?>
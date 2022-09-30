
<?php
	session_start();
    //var_dump($_POST);
    include('../models/cliente.php');
	include('../models/giro.php');
	include('../models/cajero.php');
	include('../connection_PDO.php');
	
    $clienteRut = $_SESSION["clienteRut"];
	$cajeroID = $_POST["cajeroID"];
	$girosCantidad = $_POST["girosCantidad"];
	
	$verificacion=true;
	if($girosCantidad=="")
	{
		echo "-Ingrese el monto del giro.<br>";
		$verificacion=false;
	}
	if(is_numeric($girosCantidad)==false)
	{
		echo "-El monto debe ser solo numeros.<br>";
		$verificacion=false;
	}
	
	if($verificacion==true)
	{
		$cajeroMonto = "";
		$array_cajero=Cajero::get_cajero($cajeroID);
		foreach ($array_cajero as $cajero)
		{
			$cajeroMonto=$cajero->cajeroMonto;
		}
		if($girosCantidad>$cajeroMonto)
		{
			echo "-El monto ingresado es mayor al monto del cajero.<br>";
			$verificacion=false;
		}
		
		$clienteMonto = "";
		$array_cliente=Cliente::get_cliente($clienteRut);
		foreach ($array_cliente as $cliente)
		{
			$clienteMonto=$cliente->clienteMonto;
			$clienteNombre = $cliente->clienteNombre;
			$clientePassword= $cliente->clientePassword;

		}
		if($girosCantidad>$clienteMonto)
		{
			echo "-El monto ingresado es mayor a su saldo actual.<br>";
			$verificacion=false;
		}
		if($girosCantidad<=0)
		{
			echo "-El monto ingresado no puede ser menor o igual a 0.<br>";
			$verificacion=false;
		}
		if($verificacion==true)
		{
			$girosID="autoincrement";
			$girosFecha=date("Y-m-d");
			$giro= new Giro($girosID,$clienteRut,$girosFecha,$cajeroID,$girosCantidad);
			Giro::register_giro($giro);
	
			$cliente= new Cliente($clienteRut,$clienteNombre,$clientePassword,($clienteMonto-$girosCantidad));
			Cliente::update_cliente($cliente);
			
			$cajero= new Cajero($cajeroID,($cajeroMonto-$girosCantidad));
			Cajero::update_cajero($cajero);
			
			echo "-Giro realizado correctamente.<br>";
			/*
			var_dump($giro);
			echo "<br>";
			var_dump($cliente);
			echo "<br>";
			var_dump($cajero);
			echo "<br>";
			*/
			
		}
	}
	else
	{
		echo "-Error al realizar el giro.";
	}
	
?>
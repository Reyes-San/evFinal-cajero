
<?php
	session_start();
    //var_dump($_POST);
    include('../models/mantencion.php');
	include('../models/tecnico.php');
	include('../models/cajero.php');
	include('../connection_PDO.php');
	
    $tecnicoRut = $_SESSION["tecnicoRut"];
	$cajeroID = $_POST["cajeroID"];
	$mantencionCantidad = $_POST["mantencionCantidad"];
	
	$verificacion=true;
	if($mantencionCantidad=="")
	{
		echo "-Ingrese el monto para la recarga de cajero.<br>";
		$verificacion=false;
	}
	if(is_numeric($mantencionCantidad)==false)
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
		
		if($mantencionCantidad<=0)
		{
			echo "-El monto ingresado no puede ser menor o igual a 0.<br>";
			$verificacion=false;
		}
		
		if(($cajeroMonto+$mantencionCantidad)>100000000)
		{
			echo "-El monto ingresado mas el saldo del cajero es mayor a 100 millones.<br> El saldo actual del cajero es de: ".$cajeroMonto."<br> El saldo seria: ".($cajeroMonto+$mantencionCantidad);
			$verificacion=false;
		}
		
		if($verificacion==true)
		{
			$mantencionID="autoincrement";
			$mantencionFecha=date("Y-m-d");
			$mantencion= new Mantencion($mantencionID,$tecnicoRut,$mantencionFecha,$cajeroID,$mantencionCantidad);
			Mantencion::register_mantencion($mantencion);

			
			$cajero= new Cajero($cajeroID,($cajeroMonto+$mantencionCantidad));
			Cajero::update_cajero($cajero);
			
			echo "-Mantencion realizado correctamente.<br>";
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
<?php


class Cliente
{
	#atributos
	public $clienteRut;
    public $clienteNombre;
    public $clientePassword;
    public $clienteMonto;

	#contructor
	function __construct($clienteRut,$clienteNombre,$clientePassword,$clienteMonto)
	{
		$this->clienteRut=$clienteRut;
		$this->clienteNombre=$clienteNombre;
		$this->clientePassword=$clientePassword;
		$this->clienteMonto=$clienteMonto;
	}


	public static function get_all_cliente()
	{
		include('../connection_PDO.php');
		$array_all_cliente=[];
		
		$query_get_all_cliente = "
		SELECT * FROM cliente ";

	    foreach ($myPDO->query($query_get_all_cliente) as $row)
	    {
	    	$array_all_cliente[] = new Cliente(
	    	$row['clienteRut'],
	    	$row['clienteNombre'],
	    	$row['clientePassword'],
	    	$row['clienteMonto']);
	        
	    }
	    return $array_all_cliente;
	}
	
	public static function get_cliente($clienteRut)
	{
		include('../connection_PDO.php');
		$array_cliente=[];
		
		$query_get_cliente = "
		 SELECT * FROM cliente
		 WHERE clienteRut='$clienteRut'
	  ";

	    foreach ($myPDO->query($query_get_cliente) as $row)
	    {
	    	$array_cliente[] = new Cliente(
	    	$row['clienteRut'],
	    	$row['clienteMonto'],
	    	$row['clientePassword'],
	    	$row['clienteMonto']);
	        
	    }
	    return $array_cliente;
	}
	
	public static function get_login_cliente($clienteRut,$clientePassword)
	{
		include('../connection_PDO.php');
		$array_all_cliente=[];
		
		$query_get_login_cliente = "
		 SELECT * FROM cliente
		 WHERE clienteRut='$clienteRut' 
		 AND clientePassword='$clientePassword'
	  ";

	    foreach ($myPDO->query($query_get_login_cliente) as $row)
	    {
	    	$array_all_cliente[] = new Cliente(
	    	$row['clienteRut'],
	    	$row['clienteNombre'],
	    	$row['clientePassword'],
	    	$row['clienteMonto']);
	        
	    }
	    return $array_all_cliente;
	}
	

	public static function get_all_cliente_DESC()
	{
		include('../connection_PDO.php');
		$array_all_cliente=[];
		
		$query_get_all_cliente = "
		SELECT * FROM cliente 
		ORDER BY clienteRut DESC";

	    foreach ($myPDO->query($query_get_all_cliente) as $row)
	    {
	    	$array_all_cliente[] = new Cliente(
	    	$row['clienteRut'],
	    	$row['clienteNombre'],
	    	$row['clientePassword'],
	    	$row['clienteMonto']);
	        
	    }
	    return $array_all_cliente;
	}

	public static function register_cliente($cliente)
	{
		include('../connection_PDO.php');
		$clienteRut = $cliente->clienteRut;
		$clienteNombre = $cliente->clienteNombre;
		$clientePassword= $cliente->clientePassword;
		$clienteMonto = $cliente->clienteMonto;

		$query_register_cliente = "
		INSERT INTO cliente 
        (
			clienteRut,
			clienteNombre,
			clientePassword,
			clienteMonto
        ) 
        VALUES 
        (
			'$clienteRut',
            '$clienteNombre',
			'$clientePassword',
			'$clienteMonto'
        )";

        $myPDO->query($query_register_cliente);
        //$myPDO = null;
	}

	public static function delete_cliente($clienteRut)
	{
		require_once('../connection_PDO.php');
		$clienteRut = $clienteRut;

		$query_delete_cliente = "
		DELETE FROM cliente 
		WHERE clienteRut='$clienteRut'";

        $myPDO->query($query_delete_cliente);
        //$myPDO = null;
	}

	public static function update_cliente($cliente)
	{
		include('../connection_PDO.php');
		$clienteRut = $cliente->clienteRut;
		$clienteNombre = $cliente->clienteNombre;
		$clientePassword= $cliente->clientePassword;
		$clienteMonto = $cliente->clienteMonto;

		$query_update_cliente = "
		UPDATE cliente 
		SET clienteNombre='$clienteNombre',
			clientePassword='$clientePassword',
			clienteMonto='$clienteMonto'
    	WHERE clienteRut='$clienteRut'";

        $myPDO->query($query_update_cliente);
        //$myPDO = null;
	}

}

	/////////////////	REGISTRAR 	/////////////////////
	
/*
	$clienteRut="12345";
	$clienteNombre = "clienteNombre";
	$clientePassword= "clientePassword";
	$clienteMonto = 111111;

	$cliente= new Cliente($clienteRut,$clienteNombre,$clientePassword,$clienteMonto);
	Cliente::register_cliente($cliente);
*/	

	/////////////////	LISTAR 	////////////////////

	
/*
	$array_all_cliente=Cliente::get_all_cliente();
	

	foreach ($array_all_cliente as $cliente)
	 {
		echo $clienteRut = $cliente->clienteRut;
		echo $clienteNombre = $cliente->clienteNombre;
		echo $clientePassword= $cliente->clientePassword;
		echo $clienteMonto = $cliente->clienteMonto;
	}
*/	

	//////////////////	UPDATE 	/////////////////////

	
/*
	$clienteRut = 12345;
	$clienteNombre = "clienteNombreUpdate";
	$clientePassword= "clientePasswordUpdate";
	$clienteMonto = 222222;

	$cliente= new Cliente($clienteRut,$clienteNombre,$clientePassword,$clienteMonto);
	Cliente::update_cliente($cliente);
*/
	

	////////////////	DELETE    /////////////////////

	
/*
	$clienteRut=12345;
	Cliente::delete_cliente($clienteRut);
*/
	
?>
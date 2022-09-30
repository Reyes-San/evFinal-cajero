<?php


class Cajero
{
	#atributos
	public $cajeroID;
    public $cajeroMonto;

	#contructor
	function __construct($cajeroID,$cajeroMonto)
	{
		$this->cajeroID=$cajeroID;
		$this->cajeroMonto=$cajeroMonto;
	}


	public static function get_all_cajero()
	{
		include('../connection_PDO.php');
		$array_all_cajero=[];
		
		$query_get_all_cajero = "
		SELECT * FROM cajero ";

	    foreach ($myPDO->query($query_get_all_cajero) as $row)
	    {
	    	$array_all_cajero[] = new Cajero(
	    	$row['cajeroID'],
	    	$row['cajeroMonto']);
	        
	    }
	    return $array_all_cajero;
	}
	
	public static function get_cajero($cajeroID)
	{
		include('../connection_PDO.php');
		$array_cajero=[];
		
		$query_get_cajero = "
		 SELECT * FROM cajero
		 WHERE cajeroID='$cajeroID'
	  ";

	    foreach ($myPDO->query($query_get_cajero) as $row)
	    {
	    	$array_cajero[] = new Cajero(
	    	$row['cajeroID'],
	    	$row['cajeroMonto']);
	        
	    }
	    return $array_cajero;
	}

	public static function get_all_cajero_DESC()
	{
		include('../connection_PDO.php');
		$array_all_cajero=[];
		
		$query_get_all_cajero = "
		SELECT * FROM cajero 
		ORDER BY cajeroID DESC";

	    foreach ($myPDO->query($query_get_all_cajero) as $row)
	    {
	    	$array_all_cajero[] = new Cajero(
	    	$row['cajeroID'],
	    	$row['cajeroMonto']);
	        
	    }
	    return $array_all_cajero;
	}

	public static function register_cajero($cajero)
	{
		include('../connection_PDO.php');
		$cajeroID = $cajero->cajeroID;
		$cajeroMonto = $cajero->cajeroMonto;

		$query_register_cajero = "
		INSERT INTO cajero 
        (
			cajeroID,
			cajeroMonto
        ) 
        VALUES 
        (
			'$cajeroID',
            '$cajeroMonto'
        )";

        $myPDO->query($query_register_cajero);
        //$myPDO = null;
	}

	public static function delete_cajero($cajeroID)
	{
		include('../connection_PDO.php');
		$cajeroID = $cajeroID;

		$query_delete_cajero = "
		DELETE FROM cajero 
		WHERE cajeroID='$cajeroID'";

        $myPDO->query($query_delete_cajero);
        //$myPDO = null;
	}

	public static function update_cajero($cajero)
	{
		include('../connection_PDO.php');
		$cajeroID = $cajero->cajeroID;
		$cajeroMonto = $cajero->cajeroMonto;

		$query_update_cajero = "
		UPDATE cajero 
		SET cajeroMonto='$cajeroMonto'
    	WHERE cajeroID='$cajeroID'";

        $myPDO->query($query_update_cajero);
        //$myPDO = null;
	}

}

	/////////////////	REGISTRAR 	/////////////////////
	
/*
	$cajeroID="cajeroTest1";
	$cajeroMonto = 111111111;

	$cajero= new Cajero($cajeroID,$cajeroMonto);
	Cajero::register_cajero($cajero);
*/	

	/////////////////	LISTAR 	////////////////////

	 
/*
	$array_all_cajero=Cajero::get_all_cajero();
	

	foreach ($array_all_cajero as $cajero)
	 {
		echo $cajeroID = $cajero->cajeroID;
		echo $cajeroMonto = $cajero->cajeroMonto;
	}
*/	

	//////////////////	UPDATE 	/////////////////////

	
/*
	$cajeroID = "cajeroTest1";
	$cajeroMonto = 222222222;

	$cajero= new Cajero($cajeroID,$cajeroMonto);
	Cajero::update_cajero($cajero);
*/
	

	////////////////	DELETE    /////////////////////

	

	$cajeroID="cajeroTest1";
	Cajero::delete_cajero($cajeroID);

	
?>
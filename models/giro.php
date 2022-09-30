<?php


class Giro
{
	#atributos
	public $girosID;
    public $clienteRut;
    public $girosFecha;
    public $cajeroID;
	public $girosCantidad;

	#contructor
	function __construct($girosID,$clienteRut,$girosFecha,$cajeroID,$girosCantidad)
	{
		$this->girosID=$girosID;
		$this->clienteRut=$clienteRut;
		$this->girosFecha=$girosFecha;
		$this->cajeroID=$cajeroID;
		$this->girosCantidad=$girosCantidad;
	}


	public static function get_all_giro()
	{
		include('../connection_PDO.php');
		$array_all_giro=[];
		
		$query_get_all_giro = "
		SELECT * FROM giros ";

	    foreach ($myPDO->query($query_get_all_giro) as $row)
	    {
	    	$array_all_giro[] = new Giro(
	    	$row['girosID'],
	    	$row['clienteRut'],
	    	$row['girosFecha'],
	    	$row['cajeroID'],
			$row['girosCantidad']
			);
	        
	    }
	    return $array_all_giro;
	}

	public static function get_all_giro_DESC()
	{
		include('../connection_PDO.php');
		$array_all_giro=[];
		
		$query_get_all_giro = "
		SELECT * FROM giros 
		ORDER BY girosID DESC";

	    foreach ($myPDO->query($query_get_all_giro) as $row)
	    {
	    	$array_all_giro[] = new Giro(
	    	$row['girosID'],
	    	$row['clienteRut'],
	    	$row['girosFecha'],
	    	$row['cajeroID'],
			$row['girosCantidad']
			);
	        
	    }
	    return $array_all_giro;
	}

	public static function register_giro($giro)
	{
		include('../connection_PDO.php');
		$girosID = $giro->girosID;
		$clienteRut = $giro->clienteRut;
		$girosFecha= $giro->girosFecha;
		$cajeroID = $giro->cajeroID;
		$girosCantidad = $giro->girosCantidad;
		
		$query_register_giro = "
		INSERT INTO giros 
        (
			clienteRut,
			girosFecha,
			cajeroID,
			girosCantidad
        ) 
        VALUES 
        (
            '$clienteRut',
			'$girosFecha',
			'$cajeroID',
			'$girosCantidad'
        )";

        $myPDO->query($query_register_giro);
        //$myPDO = null;
	}

	public static function delete_giro($girosID)
	{
		include('../connection_PDO.php');
		$girosID = $girosID;

		$query_delete_giro = "
		DELETE FROM giros 
		WHERE girosID='$girosID'";

        $myPDO->query($query_delete_giro);
        //$myPDO = null;
	}

	public static function update_giro($giro)
	{
		include('../connection_PDO.php');
		$girosID = $giro->girosID;
		$clienteRut = $giro->clienteRut;
		$girosFecha= $giro->girosFecha;
		$cajeroID = $giro->cajeroID;
		$girosCantidad = $giro->girosCantidad;

		$query_update_giro = "
		UPDATE giros 
		SET clienteRut='$clienteRut',
			girosFecha='$girosFecha',
			cajeroID='$cajeroID',
			girosCantidad='$girosCantidad'
    	WHERE girosID='$girosID'";

        $myPDO->query($query_update_giro);
        //$myPDO = null;
	}

}

	/////////////////	REGISTRAR 	/////////////////////
	/*

	$girosID="12331";
	$clienteRut = "clienteRut";
	$girosFecha= "urlimage";
	$cajeroID = 0;

	$giro= new Giro($girosID,$clienteRut,$girosFecha,$cajeroID);
	Giro::register_giro($giro);
	*/

	/////////////////	LISTAR 	////////////////////

	/* 

	$array_all_giro=Giro::get_all_giro();
	

	foreach ($array_all_giro as $giro)
	 {
		echo $girosID = $giro->girosID;
		echo $clienteRut = $giro->clienteRut;
		echo $girosFecha= $giro->girosFecha;
		echo $cajeroID = $giro->cajeroID;
	}
	*/

	//////////////////	UPDATE 	/////////////////////

	/*

	$girosID = 12331;
	$clienteRut = "clienteRut2";
	$girosFecha= "pass2";
	$cajeroID = 1;

	$giro= new Giro($girosID,$clienteRut,$girosFecha,$cajeroID);
	Giro::update_giro($giro);

	*/

	////////////////	DELETE    /////////////////////

	/*

	$girosID=12331;
	Giro::delete_giro($girosID);

	*/
?>
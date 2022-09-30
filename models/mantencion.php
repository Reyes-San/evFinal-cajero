<?php


class Mantencion
{
	#atributos
	public $mantencionID;
    public $tecnicoRut;
    public $mantencionFecha;
    public $cajeroID;
	public $mantencionCantidad;

	#contructor
	function __construct($mantencionID,$tecnicoRut,$mantencionFecha,$cajeroID,$mantencionCantidad)
	{
		$this->mantencionID=$mantencionID;
		$this->tecnicoRut=$tecnicoRut;
		$this->mantencionFecha=$mantencionFecha;
		$this->cajeroID=$cajeroID;
		$this->mantencionCantidad=$mantencionCantidad;
	}


	public static function get_all_mantencion()
	{
		include('../connection_PDO.php');
		$array_all_mantencion=[];
		
		$query_get_all_mantencion = "
		SELECT * FROM mantencion ";

	    foreach ($myPDO->query($query_get_all_mantencion) as $row)
	    {
	    	$array_all_mantencion[] = new Mantencion(
	    	$row['mantencionID'],
	    	$row['tecnicoRut'],
	    	$row['mantencionFecha'],
	    	$row['cajeroID'],
			$row['mantencionCantidad']
			);
	        
	    }
	    return $array_all_mantencion;
	}

	public static function get_all_mantencion_DESC()
	{
		include('../connection_PDO.php');
		$array_all_mantencion=[];
		
		$query_get_all_mantencion = "
		SELECT * FROM mantencion 
		ORDER BY mantencionID DESC";

	    foreach ($myPDO->query($query_get_all_mantencion) as $row)
	    {
	    	$array_all_mantencion[] = new Mantencion(
	    	$row['mantencionID'],
	    	$row['tecnicoRut'],
	    	$row['mantencionFecha'],
	    	$row['cajeroID'],
			$row['mantencionCantidad']
			);
	        
	    }
	    return $array_all_mantencion;
	}

	public static function register_mantencion($mantencion)
	{
		include('../connection_PDO.php');
		$mantencionID = $mantencion->mantencionID;
		$tecnicoRut = $mantencion->tecnicoRut;
		$mantencionFecha= $mantencion->mantencionFecha;
		$cajeroID = $mantencion->cajeroID;
		$mantencionCantidad = $mantencion->mantencionCantidad;
		
		$query_register_mantencion = "
		INSERT INTO mantenciones 
        (
			tecnicoRut,
			mantencionFecha,
			cajeroID,
			mantencionCantidad
        ) 
        VALUES 
        (
            '$tecnicoRut',
			'$mantencionFecha',
			'$cajeroID',
			'$mantencionCantidad'
        )";

        $myPDO->query($query_register_mantencion);
        //$myPDO = null;
	}

	public static function delete_mantencion($mantencionID)
	{
		include('../connection_PDO.php');
		$mantencionID = $mantencionID;

		$query_delete_mantencion = "
		DELETE FROM mantenciones 
		WHERE mantencionID='$mantencionID'";

        $myPDO->query($query_delete_mantencion);
        //$myPDO = null;
	}

	public static function update_mantencion($mantencion)
	{
		include('../connection_PDO.php');
		$mantencionID = $mantencion->mantencionID;
		$tecnicoRut = $mantencion->tecnicoRut;
		$mantencionFecha= $mantencion->mantencionFecha;
		$cajeroID = $mantencion->cajeroID;
		$mantencionCantidad = $mantencion->mantencionCantidad;

		$query_update_mantencion = "
		UPDATE mantenciones 
		SET tecnicoRut='$tecnicoRut',
			mantencionFecha='$mantencionFecha',
			cajeroID='$cajeroID',
			mantencionCantidad='$mantencionCantidad'
    	WHERE mantencionID='$mantencionID'";

        $myPDO->query($query_update_mantencion);
        //$myPDO = null;
	}

}

	/////////////////	REGISTRAR 	/////////////////////
	/*

	$mantencionID="12331";
	$tecnicoRut = "tecnicoRut";
	$mantencionFecha= "urlimage";
	$cajeroID = 0;

	$mantencion= new Mantencion($mantencionID,$tecnicoRut,$mantencionFecha,$cajeroID);
	Mantencion::register_mantencion($mantencion);
	*/

	/////////////////	LISTAR 	////////////////////

	/* 

	$array_all_mantencion=Mantencion::get_all_mantencion();
	

	foreach ($array_all_mantencion as $mantencion)
	 {
		echo $mantencionID = $mantencion->mantencionID;
		echo $tecnicoRut = $mantencion->tecnicoRut;
		echo $mantencionFecha= $mantencion->mantencionFecha;
		echo $cajeroID = $mantencion->cajeroID;
	}
	*/

	//////////////////	UPDATE 	/////////////////////

	/*

	$mantencionID = 12331;
	$tecnicoRut = "tecnicoRut2";
	$mantencionFecha= "pass2";
	$cajeroID = 1;

	$mantencion= new Mantencion($mantencionID,$tecnicoRut,$mantencionFecha,$cajeroID);
	Mantencion::update_mantencion($mantencion);

	*/

	////////////////	DELETE    /////////////////////

	/*

	$mantencionID=12331;
	Mantencion::delete_mantencion($mantencionID);

	*/
?>
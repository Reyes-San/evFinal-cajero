<?php


class Tecnico
{
	#atributos
	public $tecnicoRut;
    public $tecnicoNombre;
    public $tecnicoPassword;
    public $tecnicoTipo;

	#contructor
	function __construct($tecnicoRut,$tecnicoNombre,$tecnicoPassword,$tecnicoTipo)
	{
		$this->tecnicoRut=$tecnicoRut;
		$this->tecnicoNombre=$tecnicoNombre;
		$this->tecnicoPassword=$tecnicoPassword;
		$this->tecnicoTipo=$tecnicoTipo;
	}


	public static function get_all_tecnico()
	{
		include('../connection_PDO.php');
		$array_all_tecnico=[];
		
		$query_get_all_tecnico = "
		SELECT * FROM tecnico ";

	    foreach ($myPDO->query($query_get_all_tecnico) as $row)
	    {
	    	$array_all_tecnico[] = new Tecnico(
	    	$row['tecnicoRut'],
	    	$row['tecnicoNombre'],
	    	$row['tecnicoPassword'],
	    	$row['tecnicoTipo']);
	        
	    }
	    return $array_all_tecnico;
	}
	
	public static function get_login_tecnico($tecnicoRut,$tecnicoPassword)
	{
		include('../connection_PDO.php');
		$array_all_tecnico=[];
		
		$query_get_login_tecnico = "
		 SELECT * FROM tecnico
		 WHERE tecnicoRut='$tecnicoRut' 
		 AND tecnicoPassword='$tecnicoPassword'
	  ";

	    foreach ($myPDO->query($query_get_login_tecnico) as $row)
	    {
	    	$array_all_tecnico[] = new Tecnico(
	    	$row['tecnicoRut'],
	    	$row['tecnicoNombre'],
	    	$row['tecnicoPassword'],
	    	$row['tecnicoTipo']);
	        
	    }
	    return $array_all_tecnico;
	}

	public static function get_all_tecnico_DESC()
	{
		include('../connection_PDO.php');
		$array_all_tecnico=[];
		
		$query_get_all_tecnico = "
		SELECT * FROM tecnico 
		ORDER BY tecnicoRut DESC";

	    foreach ($myPDO->query($query_get_all_tecnico) as $row)
	    {
	    	$array_all_tecnico[] = new Tecnico(
	    	$row['tecnicoRut'],
	    	$row['tecnicoNombre'],
	    	$row['tecnicoPassword'],
	    	$row['tecnicoTipo']);
	        
	    }
	    return $array_all_tecnico;
	}

	public static function register_tecnico($tecnico)
	{
		include('../connection_PDO.php');
		$tecnicoRut = $tecnico->tecnicoRut;
		$tecnicoNombre = $tecnico->tecnicoNombre;
		$tecnicoPassword= $tecnico->tecnicoPassword;
		$tecnicoTipo = $tecnico->tecnicoTipo;

		$query_register_tecnico = "
		INSERT INTO tecnico 
        (
			tecnicoRut,
			tecnicoNombre,
			tecnicoPassword,
			tecnicoTipo
        ) 
        VALUES 
        (
			'$tecnicoRut',
            '$tecnicoNombre',
			'$tecnicoPassword',
			'$tecnicoTipo'
        )";

        $myPDO->query($query_register_tecnico);
        //$myPDO = null;
	}

	public static function delete_tecnico($tecnicoRut)
	{
		require_once('../connection_PDO.php');
		$tecnicoRut = $tecnicoRut;

		$query_delete_tecnico = "
		DELETE FROM tecnico 
		WHERE tecnicoRut='$tecnicoRut'";

        $myPDO->query($query_delete_tecnico);
        //$myPDO = null;
	}

	public static function update_tecnico($tecnico)
	{
		require_once('../connection_PDO.php');
		$tecnicoRut = $tecnico->tecnicoRut;
		$tecnicoNombre = $tecnico->tecnicoNombre;
		$tecnicoPassword= $tecnico->tecnicoPassword;
		$tecnicoTipo = $tecnico->tecnicoTipo;

		$query_update_tecnico = "
		UPDATE tecnico 
		SET tecnicoNombre='$tecnicoNombre',
			tecnicoPassword='$tecnicoPassword',
			tecnicoTipo='$tecnicoTipo'
    	WHERE tecnicoRut='$tecnicoRut'";

        $myPDO->query($query_update_tecnico);
        //$myPDO = null;
	}

}

	/////////////////	REGISTRAR 	/////////////////////
	/*

	$tecnicoRut="12331";
	$tecnicoNombre = "tecnicoNombre";
	$tecnicoPassword= "urlimage";
	$tecnicoTipo = 0;

	$tecnico= new Tecnico($tecnicoRut,$tecnicoNombre,$tecnicoPassword,$tecnicoTipo);
	Tecnico::register_tecnico($tecnico);
	*/

	/////////////////	LISTAR 	////////////////////

	/* 

	$array_all_tecnico=Tecnico::get_all_tecnico();
	

	foreach ($array_all_tecnico as $tecnico)
	 {
		echo $tecnicoRut = $tecnico->tecnicoRut;
		echo $tecnicoNombre = $tecnico->tecnicoNombre;
		echo $tecnicoPassword= $tecnico->tecnicoPassword;
		echo $tecnicoTipo = $tecnico->tecnicoTipo;
	}
	*/

	//////////////////	UPDATE 	/////////////////////

	/*

	$tecnicoRut = 12331;
	$tecnicoNombre = "tecnicoNombre2";
	$tecnicoPassword= "pass2";
	$tecnicoTipo = 1;

	$tecnico= new Tecnico($tecnicoRut,$tecnicoNombre,$tecnicoPassword,$tecnicoTipo);
	Tecnico::update_tecnico($tecnico);

	*/

	////////////////	DELETE    /////////////////////

	/*

	$tecnicoRut=12331;
	Tecnico::delete_tecnico($tecnicoRut);

	*/
?>
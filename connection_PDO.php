<?php
    //phpinfo();
    try
    {
		//global $myPDO;
        $myPDO = new PDO("mysql:host=localhost; dbname=evFinal", "root","");
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
?>
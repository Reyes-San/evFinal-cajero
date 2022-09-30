<?php
	session_start();
	//var_dump($_POST);
	if(isset($_POST['login']))
	{
		include('../models/cliente.php');
		$clienteRut = $_POST["clienteRutLogin"];
		$clientePassword = $_POST["clientePasswordLogin"];
		
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
				echo "Cuenta no Valida";
			}
			else
			{
				foreach ($array_login_cliente as $cliente)
				{
					$_SESSION["clienteRut"]=$cliente->clienteRut;
					$_SESSION["clienteNombre"]=$cliente->clienteNombre;
					$_SESSION["clientePassword"]=$cliente->clientePassword;
					$_SESSION["clienteMonto"]=$cliente->clienteMonto;
					
					echo "Bienvenido cliente ".$_SESSION["clienteNombre"]." <br>Su saldo Actual es de: ".$_SESSION["clienteMonto"];
				}
			}
		}
		else
		{
			//echo "Error al iniciar sesion el cliente";
		}
	}
	
	if(isset($_POST['loginTecnico']))
	{
		include('../models/tecnico.php');
		$tecnicoRut = $_POST["tecnicoRut"];
		$tecnicoPassword = $_POST["tecnicoPassword"];
		
		$verificacion=true;
		if($tecnicoRut=="")
		{
			echo "-Ingrese su rut<br>";
			$verificacion=false;
		}
		if($tecnicoPassword=="")
		{
			echo "-Ingrese su password.<br>";
			$verificacion=false;
		}
		
		
		if($verificacion==true)
		{
			$array_login_tecnico=Tecnico::get_login_tecnico($tecnicoRut,$tecnicoPassword);
			if(empty($array_login_tecnico))
			{
				echo "Cuenta de tecnico no Valida";
			}
			else
			{
				foreach ($array_login_tecnico as $cliente)
				{
					$_SESSION["tecnicoRut"]=$cliente->tecnicoRut;
					$_SESSION["tecnicoNombre"]=$cliente->tecnicoNombre;
					$_SESSION["tecnicoPassword"]=$cliente->tecnicoPassword;
					$_SESSION["tecnicoTipo"]=$cliente->tecnicoTipo;
					
					echo "Bienvenido tecnico ".$_SESSION["tecnicoNombre"]." <br>";
				}
			}
		}
		else
		{
			//echo "Error al iniciar sesion el cliente";
		}
	}
	
	//$_SESSION["clienteRut"]="234324";
	//var_dump($_SESSION);
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <!-- bootstrap 4 jquery 3 ajax start -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  <!-- bootstrap 4 jquery 3 ajax end -->
  
  <script rel="text/javascript" src="../js/registrar.js"></script>

<script >
// Archivo javascript que manipulará Ajax con jQuery
$(function(){
    $("#register").click(function(evt){
		//alert("Hello! I am an alert box!!");
        evt.preventDefault();
        var action = $(this).val();
		var clienteRut = $('#clienteRut').val();
		var clientePassword = $('#clientePassword').val();
		var clienteNombre = $('#clienteNombre').val();
		var clienteMonto = $('#clienteMonto').val();
		
        $.ajax({
            url: "../controllers/register_controller.php",
            method: "POST",
            data: { action: action , clienteRut: clienteRut , clientePassword: clientePassword , clienteNombre: clienteNombre , clienteMonto: clienteMonto},
            success: function(dataresponse, statustext, response){
                var mensaje = "";
                if(dataresponse=="error")
                {
                  mensaje = "";
                } 
                else
                {
				  $("#respuesta").html("<p><strong>" + dataresponse +"</strong></p>");
                }
            },
            error: function(request, errorcode, errortext){
                $("#respuesta").html("<p>Ocurrió el siguiente error: <strong>" + errortext + "</strong></p>");
            }
        });
    });
});
</script>

<script >
// Archivo javascript que manipulará Ajax con jQuery
$(function(){
    $("#registerGiro").click(function(evt){
		//alert("Hello! I am an alert box!!");
        evt.preventDefault();
        var action = $(this).val();
		var cajeroID = $('#cajeroID').val();
		var girosCantidad = $('#girosCantidad').val();
		
        $.ajax({
            url: "../controllers/giro_controller.php",
            method: "POST",
            data: { action: action, cajeroID: cajeroID , girosCantidad: girosCantidad},
            success: function(dataresponse, statustext, response){
                var mensaje = "";
                if(dataresponse=="error")
                {
                  mensaje = "";
                } 
                else
                {
				  $("#respuestaGiro").html("<p><strong>" + dataresponse +"</strong></p>");
                }
            },
            error: function(request, errorcode, errortext){
                $("#respuestaGiro").html("<p>Ocurrió el siguiente error: <strong>" + errortext + "</strong></p>");
            }
        });
    });
});
</script>



<script >
// Archivo javascript que manipulará Ajax con jQuery
$(function(){
    $("#registerRecarga").click(function(evt){
		//alert("Hello! I am an alert box!!");
        evt.preventDefault();
        var action = $(this).val();
		var cajeroID = $('#cajeroIDRecarga').val();
		var mantencionCantidad = $('#mantencionCantidad').val();
		
        $.ajax({
            url: "../controllers/recarga_cajero_controller.php",
            method: "POST",
            data: { action: action, cajeroID: cajeroID , mantencionCantidad: mantencionCantidad},
            success: function(dataresponse, statustext, response){
                var mensaje = "";
                if(dataresponse=="error")
                {
                  mensaje = "";
                } 
                else
                {
				  $("#respuestaGiro").html("<p><strong>" + dataresponse +"</strong></p>");
                }
            },
            error: function(request, errorcode, errortext){
                $("#respuestaGiro").html("<p>Ocurrió el siguiente error: <strong>" + errortext + "</strong></p>");
            }
        });
    });
});
</script>




<style type="text/css">
    body {
    background: #eeeded;
  }

  .card {
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    transition: all 0.2s ease-in-out;
    box-sizing: border-box;
    margin-top:10px;
    margin-bottom:10px;
    background-color:#FFF;
  }

  .card:hover {
    box-shadow: 0 5px 5px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
  }
  .card > .card-inner {
    padding:10px;
  }
  .card .header h2, h3 {
    margin-bottom: 0px;
    margin-top:0px;
  }
  .card .header {
    margin-bottom:5px;
  }
  .card img{
    width:100%;
  }
</style>
</head>
<body>
  <header style="background-color:transparent !important;" >
    <div class="form-row">
      <div class="form-group col-md-4 col-sm-4">
        <a href='./index.php' class="text-white txtResponsive">
		  <span class="line-3" style="text-transform: capitalize !important;">Cajero Automatico Online Banco Estado</span>
		  <h3></h3>
		</a>
      </div>
      <!--  form select seach category start -->
      <div class="form-group col-md-4 col-sm-4">
        <div class="form-row align-items-end">
          <div class="form-group col-md-12 col-sm-12">
			<div id="respuesta">
			</div>
          </div>
        </div>
      </div>
      <!--  form select seach category end -->
	

      <div class="form-group col-md-4 col-sm-4">
        <div class="form-row align-items-end">
          
            
                <div class="form-group col-md-12 col-sm-12">
                  <!-- Button to Open the Modal  start -->
                  <button type="button" class="btn btn-danger btn-block button-hover color-11" data-toggle="modal" data-target="#ModalLogin">
                    <i class="fas fa-sign-in-alt">Login - Register</i>
                  </button>
                  <!-- Button to Open the Modal  end -->
                  
                  <!-- The Modal start-->
                  <div class='modal' id='ModalLogin'>
                    <div class='modal-dialog modal-dialog-centered'>
                      <div class='modal-content round-0' style='border-radius: 25px;'>
                      
                        <!-- Modal Header start -->
                        <div class='modal-header'>
                          <button type='button' class='close' data-dismiss='modal'>&times;</button>
                        </div>
                        <!-- Modal Header end -->

                        <!-- Modal body start-->
                        <div class='modal-body'>
                          
                            <div class="form-row">
                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="uname" class="form-control " >Rut:</label>
                                </div>
                                <div class="form-group col-md-9 col-sm-9">
                                    <input type="text" class="form-control txtResponsive" placeholder="Ingrese su rut" name="clienteRut" id="clienteRut" required>
                                </div>
                            </div>
                            <div class="form-row justify-content-end">
                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="uname" class="form-control " >Password:</label>
                                </div>
                                <div class="form-group col-md-9 col-sm-9">
                                    <input type="password" class="form-control" placeholder="*********" name="clientePassword" id="clientePassword" required>
                                </div>
                            </div>
							<div class="form-row">
                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="uname" class="form-control " >Nombre:</label>
                                </div>
                                <div class="form-group col-md-9 col-sm-9">
                                    <input type="text" class="form-control txtResponsive" placeholder="Ingrese su nombre" name="clienteNombre" id="clienteNombre" >
                                </div>
                            </div>
							<div class="form-row">
                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="uname" class="form-control " >M. Inicial:</label>
                                </div>
                                <div class="form-group col-md-9 col-sm-9">
                                    <input type="text" class="form-control txtResponsive" placeholder="Ingrese su primer monto" name="clienteMonto" id="clienteMonto" >
                                </div>
                            </div>
                            <div class="form-row justify-content-md-center txtResponsive" >
								<input type="button" value="Registrar" id="register" class="btn btn-danger btn-block button-hover color-11" />
                            </div>
							
							<br><br>
                            <form action="" class="was-validated" method="POST">
								<div class="form-row">
									<div class="form-group col-md-3 col-sm-3">
										<label for="uname" class="form-control " >Rut:</label>
									</div>
									<div class="form-group col-md-9 col-sm-9">
										<input type="text" class="form-control txtResponsive" placeholder="ej:  11.111.111-1" name="clienteRutLogin" id="clienteRutLogin" required>
									</div>
								</div>
								<div class="form-row justify-content-end">
									<div class="form-group col-md-3 col-sm-3">
										<label for="uname" class="form-control " >Password:</label>
									</div>
									<div class="form-group col-md-9 col-sm-9">
										<input type="password" class="form-control" placeholder="*********" name="clientePasswordLogin" id="clientePasswordLogin" required>
									</div>
								</div>
								<div class="form-row justify-content-md-center txtResponsive" >
									<button type="submit" name="login" class="btn btn-danger btn-block button-hover color-11" value="" >Login Cliente</button>
								</div>
                            </form> 
                            
							<br><br>
                            <form action="" class="was-validated" method="POST">
								<div class="form-row">
									<div class="form-group col-md-3 col-sm-3">
										<label for="uname" class="form-control " >Rut tecnico:</label>
									</div>
									<div class="form-group col-md-9 col-sm-9">
										<input type="text" class="form-control txtResponsive" placeholder="ej:  11.111.111-1" name="tecnicoRut" id="tecnicoRut" required>
									</div>
								</div>
								<div class="form-row justify-content-end">
									<div class="form-group col-md-3 col-sm-3">
										<label for="uname" class="form-control " >Password tecnico:</label>
									</div>
									<div class="form-group col-md-9 col-sm-9">
										<input type="password" class="form-control" placeholder="*********" name="tecnicoPassword" id="tecnicoPassword" required>
									</div>
								</div>
								<div class="form-row justify-content-md-center txtResponsive" >
									<button type="submit" name="loginTecnico" class="btn btn-danger btn-block button-hover color-11" value="" >Login Tecnico</button>
								</div>
                            </form>
							
                         </div>
                      <!-- Modal body end -->
                    </div>
                  </div>
                </div>
                <!-- The Modal end--> 
				
				
                </div>
        </div>
      </div>
    </div>
	</div>
  </header>
  
<?php
	

  if(isset($_POST['logout']))
  {
    session_destroy();
	echo("<script>location.href = 'index.php';</script>");
  }

if(isset($_SESSION["clienteRut"]))
  {
	  ?>
	  <form action="" method="POST" >
			<button type="submit" class="btn btn-danger button-hover color-11" name="logout">Logout
			 
			</button>
		  </form>
		<div class="flex-grid row">
			<div class="col-sm-6">
			  <div class="card">
				<div class="card-inner">
				  <div class="header">
					<h2>Giro</h2>
					<div class="form-row">
						<div class="form-group col-md-3 col-sm-3">
							<label for="uname" class="form-control " >Cajero ID:</label>
						</div>
						<div class="form-group col-md-9 col-sm-9">
							<input type="text" class="form-control txtResponsive" name="cajeroID" id="cajeroID" value="a001" disabled>
						</div>
						<div class="form-group col-md-3 col-sm-3">
							<label for="uname" class="form-control " >Monto giro:</label>
						</div>
						<div class="form-group col-md-9 col-sm-9">
							<input type="text" class="form-control txtResponsive" name="girosCantidad" id="girosCantidad" >
						</div>
						<div class="form-row justify-content-md-center txtResponsive" >
							<input type="button" value="Registrar giro" id="registerGiro" class="btn btn-danger btn-block button-hover color-11" />
						</div>
					</div>
				</div>
				<div class="content" id="respuestaGiro">
				  
				</div>
				  </div>
			  </div>
			</div>
			
		  </div>
	  <?php
  }
  
  if(isset($_SESSION["tecnicoTipo"]))
  {
	  if($_SESSION["tecnicoTipo"]==1){
	  ?>
	  <form action="" method="POST" >
			<button type="submit" class="btn btn-danger button-hover color-11" name="logout">Logout
			 
			</button>
		  </form>
		<div class="flex-grid row">
			<div class="col-sm-12">
			  <div class="card">
				<div class="card-inner">
				  <div class="header">
					<h2>Recarga cajero</h2>
					<?php 
					echo "Nombre tecnico: ".$_SESSION["tecnicoNombre"]." tipo: ".$_SESSION["tecnicoTipo"];
					?>
					<div class="form-row">
						<div class="form-group col-md-3 col-sm-3">
							<label for="uname" class="form-control " >Cajero ID:</label>
						</div>
						<div class="form-group col-md-9 col-sm-9">
							<input type="text" class="form-control txtResponsive" name="cajeroIDRecarga" id="cajeroIDRecarga" value="a001" disabled>
						</div>
						<div class="form-group col-md-3 col-sm-3">
							<label for="uname" class="form-control " >Monto giro:</label>
						</div>
						<div class="form-group col-md-9 col-sm-9">
							<input type="text" class="form-control txtResponsive" name="mantencionCantidad" id="mantencionCantidad" >
						</div>
						<div class="form-row justify-content-md-center txtResponsive" >
							<input type="button" value="Registrar recarga cajero" id="registerRecarga" class="btn btn-danger btn-block button-hover color-11" />
						</div>
					</div>
				</div>
				<div class="content" id="respuestaGiro">
				  
				</div>
				  </div>
			  </div>
			</div>
			
		  </div>
	  <?php
	  }
  }
  
  
  if(isset($_SESSION["tecnicoTipo"]))
  {
	  if($_SESSION["tecnicoTipo"]==0){
	  ?>
	  <form action="" method="POST" >
			<button type="submit" class="btn btn-danger button-hover color-11" name="logout">Logout
			 
			</button>
		  </form>
		<div class="flex-grid row">
			
			<div class="col-sm-12">
			  <div class="card">
				<div class="image">
				  
				</div>
				<div class="card-inner">
				  <div class="header">
					<h2>Historial Mantencion</h2>
					<?php 
					echo "Nombre tecnico: ".$_SESSION["tecnicoNombre"]." tipo: ".$_SESSION["tecnicoTipo"];
					?>
					<?php
					if(isset($_POST['verMantencion']))
					{
						$verMantencionID =$_POST['verMantencion'];
						?>
						<div class="card-body table-responsive" >

						<form id="formJoin" action="" method="POST">
						<table class="table-responsive table-striped table-bordered "  id="tblReporte">
							<thead>
								<tr>
									<th scope="col">id mantencion</th>
									<th scope="col">tecnicoRut</th>
									<th scope="col">mantencionFecha</th>
									<th scope="col">cajeroID</th>
									<th scope="col">mantencionCantidad</th>
									<th scope="col">tecnicoNombre</th>
									<th scope="col">tecnicoPassword</th>
									<th scope="col">tecnicoTipo</th>
								</tr>
							</thead>
							<tbody>  
								<?php
								include('../connection_PDO.php');
								
								$query_rdb_all="SELECT *

								FROM mantenciones
								JOIN tecnico 
								ON mantenciones.tecnicoRut=tecnico.tecnicoRut
								WHERE mantencionID='$verMantencionID'

							
								";
								foreach ($myPDO->query($query_rdb_all) as $row): 

								?> 
								<tr>
								
									<td><?= $row["mantencionID"] ?></td>
									<td><?= $row["tecnicoRut"] ?></td>
									<td><?= $row["mantencionFecha"] ?></td>
									<td><?= $row["cajeroID"] ?></td>
									<td><?= $row["mantencionCantidad"] ?></td>
									<td><?= $row["tecnicoNombre"] ?></td>
									<td><?= $row["tecnicoPassword"] ?></td>
									<td><?= $row["tecnicoTipo"] ?></td>
									
									
								</tr>
								<?php
								//var_dump($row);
								//echo "//////////////////////////////";
								endforeach;
								?>                                       
							</tbody>
						</table>
						</form>
					</div>
				<?php
					}
					if(isset($_POST['eliminarMantencion']))
					{
						$eliminarManttencionID =$_POST['eliminarMantencion'];
						
						include('../connection_PDO.php');
								
								$query_rdb_all="SELECT *

								FROM mantenciones
								
								WHERE mantencionID='$eliminarManttencionID'

							
								";
								foreach ($myPDO->query($query_rdb_all) as $row): 
								$mantencionCantidad=$row["mantencionCantidad"];
								$mantencioncajeroID=$row["cajeroID"];
								endforeach;
								include('../models/mantencion.php');
								Mantencion::delete_mantencion($eliminarManttencionID);
								include('../models/cajero.php');
								
								
								$array_cajero=Cajero::get_cajero($mantencioncajeroID);
								foreach ($array_cajero as $cajero)
								{
									$cajeroMonto=$cajero->cajeroMonto;
								}
								//echo "cajeroid<br>";
								//var_dump($mantencioncajeroID);
								//echo "cajero monto<br>";
								//var_dump($cajeroMonto);
								//echo "mantencion cantidad<br>";
								//var_dump($mantencionCantidad);
								$resta = $cajeroMonto-$mantencionCantidad;
								//echo "resta";
								//var_dump($resta);
								
								$cajero= new Cajero($mantencioncajeroID,$resta);
								Cajero::update_cajero($cajero);
					}
					?>
					
				</div>
				<div class="content">
				  <div class="card-body table-responsive" >

						<form id="formJoin" action="" method="POST">
						<table class="table-responsive table-striped table-bordered "  id="tblReporte">
							<thead>
								<tr>
									<th scope="col">id mantencion</th>
									<th scope="col">Ver</th>
									<th scope="col">Eliminar</th>
								</tr>
							</thead>
							<tbody>  
								<?php
								include('../connection_PDO.php');
								
								$query_rdb_all="SELECT *

								FROM mantenciones

							
								";
								foreach ($myPDO->query($query_rdb_all) as $row): 

								?> 
								<tr>
									<td><?= $row["mantencionID"] ?></td>
									<td><button type="submit" class="btn btn-success btn-sm btn-block" value="<?=$row["mantencionID"]?>" name="verMantencion" id="verMantencion">ver</button></td>
									<td><button type="submit" class="btn btn-danger btn-sm btn-block" value="<?=$row["mantencionID"]?>" name="eliminarMantencion" id="eliminarMantencion">eliminar</button></td>
									
									
								</tr>
								<?php
								//var_dump($row);
								//echo "//////////////////////////////";
								endforeach;
								?>                                       
							</tbody>
						</table>
					</form>
				
				</div>
				</div>
				  </div>
			  </div>
			</div>
		  </div>
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  <div class="flex-grid row">
			
			<div class="col-sm-12">
			  <div class="card">
				<div class="image">
				  
				</div>
				<div class="card-inner">
				  <div class="header">
					<h2>Historial Giros</h2>
					<?php 
					echo "Nombre tecnico: ".$_SESSION["tecnicoNombre"]." tipo: ".$_SESSION["tecnicoTipo"];
					?>
					<?php
					if(isset($_POST['verGiro']))
					{
						$verGiro =$_POST['verGiro'];
						?>
						<div class="card-body table-responsive" >

						<form id="formJoin" action="" method="POST">
						<table class="table-responsive table-striped table-bordered "  id="tblReporte">
							<thead>
								<tr>
									<th scope="col">girosID</th>
									<th scope="col">clienteRut</th>
									<th scope="col">girosFecha</th>
									<th scope="col">cajeroID</th>
									<th scope="col">girosCantidad</th>
									<th scope="col">clienteNombre</th>
									<th scope="col">clientePassword</th>
									<th scope="col">clienteMonto</th>
								</tr>
							</thead>
							<tbody>  
								<?php
								include('../connection_PDO.php');
								
								$query_rdb_all="SELECT *

								FROM giros
								JOIN cliente 
								ON giros.clienteRut=cliente.clienteRut
								WHERE girosID='$verGiro'

							
								";
								foreach ($myPDO->query($query_rdb_all) as $row): 

								?> 
								<tr>
									<td><?= $row["girosID"] ?></td>
									<td><?= $row["clienteRut"] ?></td>
									<td><?= $row["girosFecha"] ?></td>
									<td><?= $row["cajeroID"] ?></td>
									<td><?= $row["girosCantidad"] ?></td>
									<td><?= $row["clienteNombre"] ?></td>
									<td><?= $row["clientePassword"] ?></td>
									<td><?= $row["clienteMonto"] ?></td>
									
									
								</tr>
								<?php
								//var_dump($row);
								//echo "//////////////////////////////";
								endforeach;
								?>                                       
							</tbody>
						</table>
						</form>
					</div>
				<?php
					}
					if(isset($_POST['eliminarGiro']))
					{
						$eliminarGiro =$_POST['eliminarGiro'];
						//var_dump($eliminarGiro);
						
						include('../connection_PDO.php');
								
								$query_rdb_all="SELECT *

								FROM giros
								
								WHERE girosID='$eliminarGiro'

							
								";
								foreach ($myPDO->query($query_rdb_all) as $row): 
								$girosCantidad=$row["girosCantidad"];
								$cajeroID=$row["cajeroID"];
								$clienteRut=$row["clienteRut"];
								endforeach;
								//echo "giro cantidad".$girosCantidad;
								//echo " cajero id: ".$cajeroID;
								//echo "cliente rut: ".$clienteRut;
								//echo " giro id: ".$eliminarGiro;
								include('../models/giro.php');
								Giro::delete_giro($eliminarGiro);
								
								
								
								include('../models/cajero.php');
								/*$cajeroMonto=0;
								$array_cajero=Cajero::get_cajero($cajeroID);
								foreach ($array_cajero as $cajero)
								{
									$cajeroMonto=$cajero->cajeroMonto;
								}
								*/
								include('../models/cliente.php');
								$array_cliente=Cliente::get_cliente($clienteRut);
								foreach ($array_cliente as $cliente)
								{
									$clienteMonto=$cliente->clienteMonto;
									$clienteNombre = $cliente->clienteNombre;
									$clientePassword= $cliente->clientePassword;

								}
								$cliente= new Cliente($clienteRut,$clienteNombre,$clientePassword,($clienteMonto+$girosCantidad));
								Cliente::update_cliente($cliente);
								
								
								
								
								//$resta = $cajeroMonto+$girosCantidad;
								//$cajero= new Cajero($cajeroID,$resta);
								//Cajero::update_cajero($cajero);
								
								
								$array_cajero=Cajero::get_cajero($cajeroID);
								foreach ($array_cajero as $cajero)
								{
									$cajeroMonto=$cajero->cajeroMonto;
								}
								//echo "cajeroid<br>";
								//var_dump($mantencioncajeroID);
								//echo "cajero monto<br>";
								//var_dump($cajeroMonto);
								//echo "mantencion cantidad<br>";
								//var_dump($mantencionCantidad);
								$resta = $cajeroMonto+$girosCantidad;
								//echo "resta";
								//var_dump($resta);
								
								$cajero= new Cajero($cajeroID,$resta);
								Cajero::update_cajero($cajero);
								

					}
					?>
					
				</div>
				<div class="content">
				  <div class="card-body table-responsive" >

						<form id="formJoin" action="" method="POST">
						<table class="table-responsive table-striped table-bordered "  id="tblReporte">
							<thead>
								<tr>
									<th scope="col">id giro</th>
									<th scope="col">Ver</th>
									<th scope="col">Eliminar</th>
								</tr>
							</thead>
							<tbody>  
								<?php
								include('../connection_PDO.php');
								
								$query_rdb_all="SELECT *

								FROM giros

							
								";
								foreach ($myPDO->query($query_rdb_all) as $row): 

								?> 
								<tr>
									<td><?= $row["girosID"] ?></td>
									<td><button type="submit" class="btn btn-success btn-sm btn-block" value="<?=$row["girosID"]?>" name="verGiro" id="verGiro">ver</button></td>
									<td><button type="submit" class="btn btn-danger btn-sm btn-block" value="<?=$row["girosID"]?>" name="eliminarGiro" id="eliminarGiro">eliminar</button></td>
									
									
								</tr>
								<?php
								//var_dump($row);
								//echo "//////////////////////////////";
								endforeach;
								?>                                       
							</tbody>
						</table>
					</form>
				
				</div>
				</div>
				  </div>
			  </div>
			</div>
		  </div>
	  <?php
	  }
  }
	
?>
			
  
</body>
</html>



<?php
	session_start();
	var_dump($_SESSION);
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
	$("#login").click(function(evt){
		//alert("Hello! I am an alert box!!");
        evt.preventDefault();
        var action = $(this).val();
		var clienteRut = $('#clienteRut').val();
		var clientePassword = $('#clientePassword').val();
		
        $.ajax({
            url: "../controllers/login_controller.php",
            method: "POST",
            data: { action: action , clienteRut: clienteRut , clientePassword: clientePassword},
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
		  <span class="line-3" style="text-transform: capitalize !important;">Cajero Automatico Online Banco Estado<img class="Emote_emote__3LJMW" src="https://cdn.betterttv.net/emote/5ada077451d4120ea3918426/1x" alt="blobDance at 1x" style="width: 38px; height: 28px;">beta</span>
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
							<div class="form-row justify-content-end">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="uname" class="form-control " >En caso de registro llene los siguientes datos:</label>
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
                                    <label for="uname" class="form-control " >Monto Inicial:</label>
                                </div>
                                <div class="form-group col-md-9 col-sm-9">
                                    <input type="text" class="form-control txtResponsive" placeholder="Ingrese su primer monto" name="clienteMonto" id="clienteMonto" >
                                </div>
                            </div>
                            <div class="form-row justify-content-md-center txtResponsive" >
								<input type="button" value="Registrar" id="register" class="btn btn-danger btn-block button-hover color-11" />
                            </div>
                            <div class="form-row justify-content-md-center txtResponsive" >
                                <input type="button" value="Login" id="login" class="btn btn-danger btn-block button-hover color-11" />
                            </div>
                            
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
  }

	
?>
			<form action="" method="POST" >
			<button type="submit" class="btn btn-danger button-hover color-11" name="logout">Logout
			 
			</button>
		  </form>
		<div class="flex-grid row">
			<div class="col-sm-4">
			  <div class="card">
				<div class="image">
				  <img src="http://loremflickr.com/320/150?random=4" />
				</div>
				<div class="card-inner">
				  <div class="header">
					<h2>Title</h2>
					<h3>Sub-Head</h2>
				</div>
				<div class="content">
				  <p>Content area</p>
				</div>
				  </div>
			  </div>
			</div>
			<div class="col-sm-4">
			  <div class="card">
				<div class="image">
				  <img src="http://loremflickr.com/320/150?random=5" />
				</div>
				<div class="card-inner">
				  <div class="header">
					<h2>Title</h2>
					<h3>Sub-Head</h2>
				</div>
				<div class="content">
				  <p>Content area</p>
				</div>
				  </div>
			  </div>
			</div>
			<div class="col-sm-4">
			  <div class="card">
				<div class="image">
				  <img src="http://loremflickr.com/320/150?random=6" />
				</div>
				<div class="card-inner">
				  <div class="header">
					<h2>Title</h2>
					<h3>Sub-Head</h2>
				</div>
				<div class="content">
				  <p>Content area</p>
				</div>
				  </div>
			  </div>
			</div><div class="col-sm-4">
			  <div class="card">
				<div class="image">
				  <img src="http://loremflickr.com/320/150?random=2" />
				</div>
				<div class="card-inner">
				  <div class="header">
					<h2>Title</h2>
					<h3>Sub-Head</h2>
				</div>
				<div class="content">
				  <p>Content area</p>
				</div>
				  </div>
			  </div>
			</div><div class="col-sm-4">
			  <div class="card">
				<div class="image">
				  <img src="http://loremflickr.com/320/150?random=3" />
				</div>
				<div class="card-inner">
				  <div class="header">
					<h2>Title</h2>
					<h3>Sub-Head</h2>
				</div>
				<div class="content">
				  <p>Content area</p>
				</div>
				  </div>
			  </div>
			</div>
			<div class="col-sm-4">
			  <div class="card">
				<div class="image">
				  <img src="http://loremflickr.com/320/150" />
				</div>
				<div class="card-inner">
				  <div class="header">
					<h2>Title</h2>
					<h3>Sub-Head</h2>
				</div>
				<div class="content">
				  <p>Content area</p>
				</div>
				  </div>
			  </div>
			</div>
		  </div>
  
</body>
</html>




<!DOCTYPE html>
<html lang="es">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">    
	<link rel="stylesheet" href="css/style2.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
</head>
  <body>
  <!-- Menu -->
    <header>          
       <div class="container-fluid menu" >
         <nav class="navbar navbar-expand-lg container">
            <a class="navbar-brand text-light bg-gray">U-Tech</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">               
              </ul>              
            </div>
          </nav>
      </div>            
    </header>
<!-- Fin Menu -->

<!-- Bienvenida -->
<div class="container-fliud fondo">
	<div class="container">
	  <div class="row align-items-center text-center text-light py-5">
	  	<div class="col-md-12">
	  		<h1 class="display-4">Bienvenido a la pagina de matricula de U-Tech</h1>
		<p class="lead">Su futuro es ya!</p>

	  	</div>
	  </div>	
	</div>  
</div><!-- fin Bienvenida -->

<!-- CRUD -->
<div class="container-fluid bg-light ">
<div class="container py-5" >
    <div class="row">
      <div class="col-md-3 ">
          <div class="card ml-auto sombra">
              <div class="card-body">
                <h4 class="card-title text-center">Ingresar estudiante</h4>

                <form action="procesa.php" method="post" id="guarda">
                  <input type="text" value="guardar" name="opc" hidden>
                  <div class="form-group">
                  <label for="usuario" class="text-left">Carnet</label>
                  <input type="text" class="form-control" id="user" name="Carnet" placeholder="Numero de carnet">
                  
                </div>
                <div class="form-group">
                  <label for="carnet" class="text-left">Cantidad de materias</label>
                  <input type="text" class="form-control" id="user" name="materias" placeholder="Cantidad de materias">
                  
                </div>
                <div class="form-group">
                  <label for="pass">Numero de creditos</label>
                  <input type="text" class="form-control" id="pass" name="creditos" placeholder="Numero de creditos">
                </div>   
               
                <button type="submit" class="btn btn-primary">Guardar</button>
              </form>

              </div>
            </div>
      </div>
      <!-- Area donde se listan los datos -->
      <div class="col-md-9 ">
          <div class="card mr-auto sombra">
              <div class="card-body">
                <h4 class="card-title text-center">Contenedor de estudiantes</h4>               
                <ul class="list-group">

                <?php

                try {
                      $conexion = new PDO('mysql:host=localhost;dbname=universidad', "root", "");
                          
                  } catch (PDOException $e) {
                      print "¡Error!: " . $e->getMessage() . "<br/>";
                      die();
                  }

                  try
                  {
                  $sql = $conexion->prepare("SELECT * FROM matricula");
                  $sql->execute();
                  while ( $fila = $sql->fetch()) {
                    ?>
                  <li class="list-group-item">

                    Carnet = <?php echo $fila['carnet']?>, <br/>
                    Numero de materias = <?php echo $fila['materias']?>, <br/>
                    Numero de creditos = <?php echo $fila['creditos']?>, <br/>
                    Monto total = <?php echo $fila['monto']?>,
                    

                      <span class="fa-stack  float-right eliminar" id="<?php echo $fila['carnet']?>" style="color:red; cursor: pointer;" title="Eliminar Registro">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-trash fa-stack-1x fa-inverse"></i>
                      </span>

                      <span class="fa-stack  float-right modificar" id="<?php echo $fila['carnet']?>" style="color:blue; cursor: pointer ;" title="Actualizar Registro">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                      </span>
                  </li>                    
                    
                    <?php
                  }
                }
                catch(Exception $ex)
                {
                    print "¡Error!: " . $ex->getMessage() . "<br/>";
                      die();
                }
                ?>
                </ul>
              </div>
            </div>
      </div>
    </div> 
   
       
</div>
</div>
<!-- Fin CRUD -->

<!-- Modal -->
<div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Estudiante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body datos">       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>      
      </div>
    </div>
  </div>
</div>
<!-- fin Modal -->


<footer class="footer">
    <div class="container text-center text-white">
      
    </div>
</footer>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="js/scrollreveal.min.js"></script> -->
    <script src="js/helper.js"></script>
    <script>

       $(".eliminar").click(function(){
        var cedula = $(this).attr("id");
        $.ajax({
          url : "procesa.php",
          data : "opc=eliminar&carnet="+carnet,
          type : "post",
          success: function()
          {
            location.reload();
          }
        })
      });
       
       $(".modificar").click(function(){
        var cedula = $(this).attr("id");
         $.ajax({
          url : "procesa.php",
          data : "opc=modificar-form&carnet="+carnet,
          type : "post",
          success: function($datos)
          {
            $(".datos").html($datos);
          }
        })
        $('#modificar').modal('show');
      });
    </script>
  </body>
</html>

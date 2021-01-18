<?php
try {

    $conexion = new PDO('mysql:host=localhost;dbname=universidad', "root", "");
        
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}


switch($_POST['opc'])
{

 case "guardar":
 try{
  
   include("process.php");
          $sql = $conexion->prepare("INSERT INTO matricula
          VALUES('".$_POST['carnet']."','".$_POST['materias']."','".$_POST['creditos']."','".$_POST['monto']."')");       
          $sql->execute();         
          header("location:index.php");   
    }
    catch (PDOException $e) {
    print "¡Error al guardar!: " . $e->getMessage() . "<br/>";
    die();
    } 
    break;

case "eliminar":
 try{
          $sql = $conexion->prepare("DELETE FROM matricula WHERE carnet =".$_POST['carnet']);       
          $sql->execute();         
          //header("location:index.php");   
    }
      catch (PDOException $e) {
    print "¡Error al guardar!: " . $e->getMessage() . "<br/>";
    die();
} 
 break;
 case "modificar-form":
 try{
  
          $sql = $conexion->prepare("SELECT * FROM matricula WHERE carnet=".$_POST['carnet']);       
          $sql->execute();         
          if($fila = $sql->fetch())
          {  
 ?>
       <form action="procesa.php" method="post" id="modificar">
                  <input type="text" value="modificar" name="opc" hidden>
                  <input type="text" value="<?php echo $_POST['carnet']?>" name="carnet" hidden>

                  <div class="form-group">
                  <label for="usuario" class="text-left">Numero de carnet</label>
                  <input type="text" class="form-control" id="user" name="carnet" value="<?php echo $fila['carnet']?>" placeholder="carnet">
                  
                </div>
                <div class="form-group">
                  <label for="usuario" class="text-left">Numero de materias</label>
                  <input type="text" class="form-control" id="user" name="materias" value="<?php echo $fila['materias']?>" placeholder="Numero de materias">
                  
                </div>
                <div class="form-group">
                  <label for="pass">Numero de creditos</label>
                  <input type="text" class="form-control" id="pass" name="creditos" value="<?php echo $fila['creditos']?>" placeholder="Numero de creditos">
                </div>
               
                             
                <button type="submit" class="btn btn-info">Modificar</button>
              </form>
 <?php
}
  }
      catch (PDOException $e) {
    print "¡Error al guardar!: " . $e->getMessage() . "<br/>";
    die();
}
 break;
 
case "modificar":
  try{
    
    include("process.php");
          $sql = $conexion->prepare("UPDATE matricula SET materias='".$_POST['materias']."',creditos='".$_POST['creditos']."',monto='".$_POST['monto']."' WHERE carnet=".$_POST['carnet']);       
          $sql->execute();         
          header("location:index.php");   
    }
      catch (PDOException $e) {
    print "¡Error al guardar!: " . $e->getMessage() . "<br/>";
    die();
}
 break;
}







?>
<?php 
include '../functions/methods.php';
include '../helpers/footer.php';
include '../helpers/header.php';
/* Seccion Editar */

session_start();

$estudiantes = $_SESSION['estudiantes'];

$elemento = [];

if(isset($_GET['ID'])==true){

  $editID = $_GET['ID'];

  $elemento= filtro($estudiantes,'ID', $_GET['ID'])[0];

  $indexElemento = getIndex($estudiantes,'ID', $_GET['ID']);

  $carreraSeleccionadaSoftware = ($elemento['Carrera'] == "software") ? "selected":"";
  $carreraSeleccionadaMultimedia = ($elemento['Carrera'] == "multimedia") ? "selected":"";
  $carreraSeleccionadaseguridad = ($elemento['Carrera'] == "seguridad") ? "selected":"";
  $carreraSeleccionadaMecatronica = ($elemento['Carrera'] == "mecatronica") ? "selected":"";
  $carreraSeleccionadaRedes = ($elemento['Carrera'] == "redes") ? "selected":"";
}

if(isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['carrera']) && isset($_POST['status'])){

  $actualizarEstudiante = ['ID' => $_GET['ID'], 'Nombre' => $_POST['nombre'], 'Apellidos'=>$_POST['apellidos'],
                          "Carrera" => $_POST["carrera"], "Status" => $_POST["status"]];

  $estudiantes[$indexElemento] = $actualizarEstudiante;

  $_SESSION ['estudiantes'] = $estudiantes;
  
	header("Location:../index.php");
  exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Registro de Estudiantes</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/scrolling-nav.css" rel="stylesheet">
  
  <!-- Font Awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body id="page-top">

  <?php mostrarHeader();?>

  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>Bienvenido a la pantalla de edicion</h1>
      <p class="lead">Forma parte de la familia mas grande de profesionales</p>
    </div>
  </header>

  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Edicion del Estudiantes</h2>
          <p class="lead">Actualiza la informacion del estudiante seleccionado:</p>
          <form method="POST" action ="editar.php?ID=<?php echo $elemento["ID"] ?>">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="nombre" class="lead">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Indroduza su nombre" value="<?php echo $elemento['Nombre'] ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="apellidos" class="lead">Apellidos</label>
                  <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Introduzca su apellido" value= "<?php echo $elemento['Apellidos'] ?>">
                </div>
                <div class="form-group col-md-12">
                  <label for="carrera" class="lead">Carrera</label>
                  <select id="carrera" name="carrera" class="form-control">
                    <option <?php echo $carreraSeleccionadaSoftware;?> class="lead" value="software" name="carrera">Software</option>
                    <option <?php echo $carreraSeleccionadaMultimedia;?> class="lead" value="multimedia" name="carrera">Multimedia</option>
                    <option <?php echo $carreraSeleccionadaMecatronica;?> class="lead" value="mecatronica" name="carrera">Mecatronica</option>
                    <option <?php echo $carreraSeleccionadaseguridad;?> class="lead" value="seguridad" name="carrera">seguridad</option>
                    <option <?php echo $carreraSeleccionadaRedes;?> class="lead" value="redes" name="carrera">Redes</option>
                  </select>
                 </div>
                 <div class="form-group">
                
                 <label for="" class="lead"> Estado del estudiante</label>
                 <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="statusA" value="Activo"  <?php if($elemento['Status']=="Activo") echo "checked";?>>
                    <label class="form-check-label lead" for="statusA">
                      Activo
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="statusI" value="Inactivo"<?php if($elemento['Status']=="Inactivo") echo "checked";?>>
                    <label class="form-check-label lead" for="statusI">
                      Inactivo
                    </label>
                  </div>
                 </div>
               </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
          </form>
        </div>
      </div>
    </div>
  </section>

 <?php mostrarFooter(); ?>
 
	</body>
</html>
<?php

include 'helpers/header.php';
include 'helpers/footer.php';
include 'functions/methods.php';

session_start();

/* Seccion Mostrar/Filtrar */

$_SESSION['estudiantes'] = isset($_SESSION['estudiantes']) ? $_SESSION['estudiantes'] : array();

$listaEstudiantes = $_SESSION['estudiantes'];

if(!empty($listaEstudiantes)){
     if(isset($_GET['Carrera'])) $listaEstudiantes = filtro($listaEstudiantes,'Carrera',$_GET['Carrera']);
}



if(isset($_GET['ID'])==true){

    $index = $_GET['ID'];

    unset($listaEstudiantes[$index]);

    $listaEstudiantes = array_values($listaEstudiantes);

    $_SESSION['estudiantes'] = $listaEstudiantes;

    header("Location:index.php");
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
  <link href="styles/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="styles/css/scrolling-nav.css" rel="stylesheet">
  
  <!-- Font Awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body id="page-top">
  
    <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><i class="fa fa-id-card" aria-hidden="true"></i> ITLA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="utilities/guardar.php?page=true">Añadir</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Listado</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>Bienvenido al listado de estudiantes</h1>
      <p class="lead">Forma parte de la familia mas grande de profesionales</p>
    </div>
  </header>

  <section id="services" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Listado de Estudiantes</h2>
          
          <div class="form-group col-md-12">
                  <label for="carrera" class="lead">Realizar Filtro</label>
                  <select id="carrera" name="carrera" class="form-control" onchange="location=this.value">
                  <?php if(empty($_GET["Carrera"])):?>
                    <option class="lead" value="index.php" selected>Todos</option>
                    <option class="lead" value="index.php?Carrera=software" name="carrera">Software</option>
                    <option class="lead" value="index.php?Carrera=multimedia" name="carrera">Multimedia</option>
                    <option class="lead" value="index.php?Carrera=mecatronica" name="carrera">Mecatronica</a></option>
                    <option class="lead" value="index.php?Carrera=seguridad" name="carrera">seguridad</option>
                    <option class="lead" value="index.php?Carrera=redes" name="carrera">Redes</option>
                   <?php else:?>
                    <option class="lead" value="index.php">Todos</option>
                    <option class="lead" value="index.php?Carrera=software" name="carrera" <?php if($_GET["Carrera"]=="software") echo "selected"?>>Software</option>
                    <option class="lead" value="index.php?Carrera=multimedia" name="carrera" <?php if($_GET["Carrera"]=="multimedia") echo "selected"?> >Multimedia</option>
                    <option class="lead" value="index.php?Carrera=mecatronica" name="carrera" <?php if($_GET["Carrera"]=="mecatronica") echo "selected"?> >Mecatronica</a></option>
                    <option class="lead" value="index.php?Carrera=seguridad" name="carrera" <?php if($_GET["Carrera"]=="seguridad") echo "selected"?> >seguridad</option>
                    <option class="lead" value="index.php?Carrera=redes" name="carrera" <?php if($_GET["Carrera"]=="redes") echo "selected"?> >Redes</option>
                  <?php endif?>
                  </select>
                 </div>
          
          <table class="table table-striped table-dark">

          <?php if(empty($listaEstudiantes)):?>
          <thead>
    <tr>
      <th scope="col"><i class="fa fa-id-badge" aria-hidden="true"></i> ID</th>
      <th scope="col"><i class="fa fa-user" aria-hidden="true"></i> Nombre</th>
      <th scope="col"><i class="fa fa-user" aria-hidden="true"></i> Apellido</th>
      <th scope="col"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Carrea</th>
      <th scope="col"><i class="fa fa-bell" aria-hidden="true"></i><i class="fa fa-bell-slash" aria-hidden="true"></i> Status</th>
      <th scope="col"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</th>
    </tr>
  </thead>
  <tbody>
     <tr>
      <th colspan="6">No hay estudiantes registrados</th>
    </tr>

<?php else:?>

  <thead>
    <tr>
      <th scope="col"><i class="fa fa-id-badge" aria-hidden="true"></i> ID</th>
      <th scope="col"><i class="fa fa-user" aria-hidden="true"></i> Nombre</th>
      <th scope="col"><i class="fa fa-user" aria-hidden="true"></i> Apellido</th>
      <th scope="col"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Carrea</th>
      <th scope="col"><i class="fa fa-bell" aria-hidden="true"></i><i class="fa fa-bell-slash" aria-hidden="true"></i> Status</th>
      <th scope="col"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</th>
      <th scope="col"><i class="fa fa-ban" aria-hidden="true"></i></th>
    </tr>
  </thead>
  <tbody>

  <?php foreach($listaEstudiantes as $estudiante): ?>
  <tr <?php if($estudiante['Status']=='Inactivo') echo "style='background-color:#B22222'";?>>
  
      <th scope="row"><?php echo $estudiante['ID']?></th>
      <td><?php echo $estudiante['Nombre']?></td>
      <td><?php echo $estudiante['Apellidos']?></td>
      <td><?php echo $estudiante['Carrera']?></td>
      <td><?php echo $estudiante['Status']?></td>
      <td><a href="utilities/editar.php?page=true&ID=<?php echo $estudiante['ID'] ?>" class="btn btn-sm btn-outline-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
      <td><a href="index.php?page=true&ID=<?php echo array_search($estudiante, $listaEstudiantes) ?>"class="btn btn-sm btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
    </tr>

<?php endforeach;?>
<?php endif;?>
  </tbody>
</table>
         
        </div>
      </div>
    </div>
  </section>
  
  <?php mostrarFooter();?>

</body>

</html>

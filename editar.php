<?php
include("db.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM estudiante WHERE id = $id";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $nom = $row['nombre'];
        $fechaNaci = $row['fechaNacimiento'];
        $papa = $row['PAPA'];
    }
}
if(isset($_POST['edit'])){
    $iden = $_POST['iden'];
    $nom = $_POST['nom'];
    $fechaNaci = $_POST['fechaNaci'];
    $papa = $_POST['papa'];
    $query = "UPDATE estudiante SET id=$iden, nombre='$nom', fechaNacimiento='$fechaNaci', PAPA=$papa 
    WHERE id = $id";
    $result = mysqli_query($conn,$query);
    if (!$result) {
        $_SESSION['mensaje'] = "No se pudo editar";
        $_SESSION['tipo_mensaje'] = "danger";
    }
    else{
        $_SESSION['mensaje'] = "Estudiante editado";
        $_SESSION['tipo_mensaje'] = "success";
    }
    header("Location: index.php");
}?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD con PHP</title>
    <!--- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="index.php" class="navbar-brand">CRUD con PHP</a>
    </div>
</nav>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar.php?id=<?php echo $id; ?>" method="POST">
                    <div class="mb-3">
                        <label for="iden" class="form-label">Identificación:</label>
                        <input type="text" id="iden" name="iden" class="form-control" value="<?php echo $id; ?>" require>
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nombre completo:</label>
                        <input type="text" id="nom" name="nom" class="form-control" value="<?php echo $nom; ?>" require>
                    </div>
                    <div class="mb-3">
                        <label for="fechaNaci" class="form-label">Fecha de Nacimiento:</label>
                        <input type="date" id="fechaNaci" name="fechaNaci" class="form-control" value="<?php echo $fechaNaci; ?>" require>
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">P.A.P.A.:</label>
                        <input type="number" id="papa" name="papa" step="any" class="form-control" value="<?php echo $papa; ?>" require>                    
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="edit" value="Editar">
                </form>
            </div>
        </div>
    </div>
</div> 

<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
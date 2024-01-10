<?php
include_once "encabezado.php";

//generamos la conexion a bbdd
$mysqli = include_once "conexion.php";

//capturamos el id del videojuego seleccionado enviado por metodo get
$id = $_GET["id"];

//preparamos la consulta select con where praa traer los datos del juego a editar
$sentencia = $mysqli->prepare("SELECT * FROM colaborador WHERE id_colaborador = ?");

$sentencia->bind_param("i", $id);

$sentencia->execute();

$resultado = $sentencia->get_result();

# Obtenemos solo una fila, que será el videojuego a editar
$colaborador = $resultado->fetch_assoc();
$space = " ";
if (!$colaborador) {
    exit("No hay resultados para este colaborador");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <link rel="stylesheet" href="https://fontawesome.com/v4/assets/font-awesome/css/font-awesome.min.css">
    <title>Sistema control inventario TI MDA</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
    <script src="script.js"></script>
    <style>
        .custom-form {
            width: 60%;
            margin: auto;
            /* border: 1px solid #495057; */
        }

        .custom-form label {
            display: block;
            text-align: left;
            margin-left: 20px;
        }

        .custom-form input,
        .custom-form select {
            display: block;
            margin: 0.375rem 0;
            width: calc(100% - 20px);
            padding: 0.5rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #495057;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .custom-form select {
            width: calc(100% - 50px);
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 60px;
            margin-top: 20px;
        }

        .button-container button,
        .button-container a {
            width: 25%;
        }
    </style>
</head>

<body>
    <div class="sidenav-header">
        <div class="row">
            <div class="col-12">

                <form action="actualizar.php" method="POST" class="custom-form" style="width: 50%;">
                    <input type="hidden" name="id" value="<?php echo $colaborador["id_colaborador"] ?>">
                    <div class="form-group">
                        <h1>Actualizar Datos de <?php echo $colaborador["nombre_colaborador"], $space, $colaborador["apellido_pat_colaborador"] ?></h1>
                        <label for="rut">RUT</label>
                        <input value="<?php echo $colaborador["rut_colaborador"] ?>" placeholder="RUT" class="form-control" type="text" name="rut" id="rut" style="width: 300px; text-align: center;" readonly>
                    </div>
                    <!-- inicio nombre completo -->
                    <div class="form-group" style="display: flex; justify-content: space-between;">
                        <div style="flex: 1; margin-right: 10px;">
                            <label for="nombre">Nombre</label>
                            <input value="<?php echo $colaborador["nombre_colaborador"] ?>" placeholder="Nombre" class="form-control" type="text" name="nombre" id="nombre" required>
                        </div>
                        <div style="flex: 1; margin-right: 10px;">
                            <label for="ap">Apellido Paterno</label>
                            <input value="<?php echo $colaborador["apellido_pat_colaborador"] ?>" placeholder="Apellido paterno" class="form-control" type="text" name="ap" id="ap" required>
                        </div>
                        <div style="flex: 1;">
                            <label for="am">Apellido Materno</label>
                            <input value="<?php echo $colaborador["apellido_mat_colaborador"] ?>" placeholder="Apellido Materno" class="form-control" type="text" name="am" id="am" required>
                        </div>
                    </div>
                    <!-- fin nombre completo -->

                    <div class="form-group">
                        <label for="nombre">Email</label>
                        <input value="<?php echo $colaborador["mail_colaborador"] ?>" placeholder="Email colaborador" class="form-control" type="text" name="mail" id="mail" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Dirección</label>
                        <input value="<?php echo $colaborador["direccion_colaborador"] ?>" placeholder="Direccion" class="form-control" type="text" name="direc" id="direc" required>
                    </div>
                    <!-- inicio celulares -->
                    <div class="form-group" style="display: flex; justify-content: space-between;">
                        <div style="flex: 1; margin-right: 10px;">
                            <label for="nombre">Celular MDA</label>
                            <input value="<?php echo $colaborador["celular_mda_colaborador"] ?>" placeholder="Celular MDA" class="form-control" type="text" name="celular" id="celular" required>
                        </div>
                        <div style="flex: 1;">
                            <label for="nombre">Celular Personal</label>
                            <input value="<?php echo $colaborador["celular_per_colaborador"] ?>" placeholder="Celular Personal" class="form-control" type="text" name="celular_Personal" id="celular_Personal" required>
                        </div>
                    </div>
                    <!-- fin celulares -->
                    <div class="form-group button-container">
                        <button class="btn btn-success">Guardar</button>
                        <a class="btn btn-warning" href="usuarios.php">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
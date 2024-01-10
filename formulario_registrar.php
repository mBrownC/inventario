<?php include_once "encabezado.php";
include_once "conexion.php";

$option_del_select = "";
$sql_tipo = "select * from tipo_empresa;";

// Obtención de tipo de empresa
if ($result = mysqli_query($mysqli, $sql_tipo)) {
  $cont_types = mysqli_num_rows($result);
  if ($cont_types > 0) {
    while ($listtypes = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      $id = $listtypes['id_tipo_empresa'];
      $type_company = $listtypes['tipo_empresa'];
      $option_del_select .= "<option value=\"$id\">$type_company</option>";
    }
  } else {
    $option_del_select .= "<option value=\"0\">No hay Tipo de Empresa Registrad</option>";
  }
} else {
  $option_del_select .= "<option value=\"0\">No se obtuvieron datos</option>";
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
        <form action="registrar.php" method="POST" class="custom-form" style="margin-top: 50px;">

          <div class="form-group">
            <h1>Registrar Nuevo Colaborador</h1>
            <label for="rut">RUT</label>
            <input placeholder="00000000-0" class="form-control" type="text" name="rut" id="rut" style="width: 300px;" required>
          </div>

          <!-- inicio caja nombre -->
          <div class="form-group" style="display: flex; justify-content: space-between;">
            <div style="flex: 1; margin-right: 10px;">
              <label for="nombre">Nombre</label>
              <input placeholder="NOMBRE" class="form-control" type="text" name="nombre" id="nombre" required>
            </div>
            <div style="flex: 1; margin-right: 10px;">
              <label for="ap">Apellido Paterno</label>
              <input placeholder="APELLIDO PATERNO" class="form-control" type="text" name="ap" id="ap" required>
            </div>
            <div style="flex: 1;">
              <label for="am">Apellido Materno</label>
              <input placeholder="APELLIDO MATERNO" class="form-control" type="text" name="am" id="am" required>
            </div>
          </div>
          <!-- fin caja nombre -->

          <div class="form-group">
            <label for="direc">Dirección</label>

            <input placeholder="DIRECCIÓN" class="form-control" type="text" name="direc" id="direc" required>

          </div>

          <div class="form-group">
            <label for="mail">Email Corporativo</label>

            <input placeholder="email@correo.cl" class="form-control" type="mail" name="mail" id="mail" required>

          </div>

          <div class="form-group">

            <label for="tipoEmpresa">Tipo de Empresa</label>
            <select name="id_empresa" style="margin-left: 15px; margin-right: 15px; ">
              <?php echo $option_del_select;
              ?>
            </select>
          </div>

          <!-- inicio celulares -->
          <div class="form-group" style="display: flex; justify-content: space-between;">
            <div style="flex: 1; margin-right: 10px;">
              <label for="celular_mda">Celular MDA</label>

              <input placeholder="Celular MDA" class="form-control" type="text" name="celular_mda" id="celular_mda">

            </div>
            <div style="flex: 1;">
              <label for="celular_per">Celular Personal</label>

              <input placeholder="Celular Personal" class="form-control" type="text" name="celular_per" id="celular_per" required>

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
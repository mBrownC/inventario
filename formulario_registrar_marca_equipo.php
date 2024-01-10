<?php include_once "encabezado.php"; ?>


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
                <form action="registrar_marca_equipo.php" method="POST" class="custom-form" style="margin-top: 50px;">
                    <div class="form-group">
                        <h1>Registrar marca equipo</h1>
                        <label for="tipo">Marca equipo</label>


                        <input placeholder="Marca equipo" class="form-control" type="text" name="marca" id="marca" required>


                    </div>


                    <div class="form-group button-container">
                        <button class="btn btn-success">Guardar</button>
                        <a class="btn btn-warning" href="mantenedores.php#tabs-2">Volver</a>
                    </div>
                </form>
                </div>
    </div>
  </div>

</body>

</html>
<?php include_once "encabezado.php";
include_once "conexion.php";
$option_del_select = "";
$sql_tipo = "select * from tipo_equipo";

$option_del_select_brand = "";
$sql_marca = "select * from marca_equipo";

$option_del_select_model = "";
$sql_modelo = "select * from modelo_equipo";

//Obtencion de tipo del equipo
if ($result = mysqli_query($mysqli, $sql_tipo)) {
    $cont_types = mysqli_num_rows($result);
    if ($cont_types > 0) {
        while ($listtypes = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $id = $listtypes['id_tipo_equipo'];
            $type_equipment = $listtypes['tipo_equipo'];
            $option_del_select .= "<option value=\"$id\">$type_equipment</option>";
        }
    } else {
        $option_del_select .= "<option value=\"0\">No hay Tipo de Equipo Registrado</option>";
    }
} else {
    $option_del_select .= "<option value=\"0\">No se obtuvieron datos</option>";
}

//Obtencion de la marca del equipo
if ($result_marca = mysqli_query($mysqli, $sql_marca)) {
    $cont_brand = mysqli_num_rows($result_marca);
    if ($cont_brand > 0) {
        while ($list_brand = mysqli_fetch_array($result_marca, MYSQLI_ASSOC)) {
            $id_marca = $list_brand['id_marca_equipo'];
            $brand_equipment = $list_brand['marca_equipo'];
            $option_del_select_brand .= "<option value=\"$id_marca\">$brand_equipment</option>";
        }
    } else {
        $option_del_select_brand .= "<option value=\"0\">No hay Tipo de Equipo Registrado</option>";
    }
} else {
    $option_del_select_brand .= "<option value=\"0\">No se obtuvieron datos</option>";
}

//Obtencion del modelo del equipo
if ($result_modelo = mysqli_query($mysqli, $sql_modelo)) {
    $cont_model = mysqli_num_rows($result_modelo);
    if ($cont_model > 0) {
        while ($list_model = mysqli_fetch_array($result_modelo, MYSQLI_ASSOC)) {
            $id_modelo = $list_model['id_modelo_equipo'];
            $model_equipment = $list_model['modelo_equipo'];
            $option_del_select_model .= "<option value=\"$id_modelo\">$model_equipment</option>";
        }
    } else {
        $option_del_select_model .= "<option value=\"0\">No hay Tipo de Equipo Registrado</option>";
    }
} else {
    $option_del_select_model .= "<option value=\"0\">No se obtuvieron datos</option>";
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


    <!-- inicio from -->
    <div class="sidenav-header">
        <div class="row">
            <div class="col-12">

                <form action="registrar_equipo_nuevo.php" method="POST" class="custom-form" style="margin-top: 50px;">
                    <div class="form-group">
                        <h1>Registrar Nuevo Equipo</h1>
                        <label for="serial_equipo">Serial</label>
                        <input placeholder="SERIAL" class="form-control" type="text" name="serial_equipo" id="serial_equipo" style="width: 500px;" required>
                    </div>
                    <div class="form-group">
                        <label for="id_tipo_equipo">Tipo de Equipo</label>
                        <select name="id_tipo_equipo" style="width: 300px;">
                            <?php echo $option_del_select;
                            ?>
                        </select>
                    </div>
                    <!-- inicio marca modelo -->
                    <div class="form-group" style="display: flex; justify-content: space-between;">
                        <div style="flex: 1; margin-right: 10px;">
                            <label for="id_marca">Marca de Equipo</label>
                            <select name="id_marca">
                                <?php echo $option_del_select_brand;
                                ?>
                            </select>
                        </div>
                        <div style="flex: 1;">
                            <label for="id_modelo">Modelo de Equipo</label>
                            <select name="id_modelo">
                                <?php echo $option_del_select_model;
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- fin marca modelo  -->

                    <!-- inicio compra -->
                    <div class="form-group" style="display: flex; justify-content: space-between;">
                        <div style="flex: 1; margin-right: 10px;">
                        <label for="valor_equipo">Valor Equipo</label>
                        <input placeholder="Valor Equipo" class="form-control" type="number" name="valor_equipo" id="valor_equipo" required>
                        </div>
            <div style="flex: 1;">
                            <label for="fecha_compra_equipo">Fecha Compra Equipo</label>
                            <input placeholder="dd/mm/aaaa" class="form-control" type="text" name="fecha_compra_equipo" id="fecha_compra_equipo">
                        </div>
                        <div>
                            <label for="">Adjuntar Factura / Boleta</label>
                            
                        </div>
                        </div>
                        <!-- fin compra -->

                        <div class="form-group">
                            <label for="procesador_equipo">Procesador Equipo</label>
                            <input placeholder="Procesador Equipo" class="form-control" type="text" name="procesador_equipo" id="procesador_equipo">
                        </div>
                        <div class="form-group">
                            <label for="ram_equipo">RAM</label>
                            <input placeholder="RAM" class="form-control" type="text" name="ram_equipo" id="ram_equipo">
                        </div>

                        <!-- inicio almacenamiento -->
                        <div class="form-group" style="display: flex; justify-content: space-between;">
                        <div style="flex: 1; margin-right: 10px;">
                            <label for="tipo_hdd_equipo">Tipo de Almacenamiento</label>
                            <input placeholder="Tipo de Disco" class="form-control" type="text" name="tipo_hdd_equipo" id="tipo_hdd_equipo">
                            </div>
            <div style="flex: 1;">
                                <label for="capacidad_hdd_equipo">Capacidad de Almacenamiento</label>
                                <input placeholder="Capacidad del Disco" class="form-control" type="text" name="capacidad_hdd_equipo" id="capacidad_hdd_equipo">
                            </div>
                            </div>
                            <!-- fin almacenamiento -->
                            <div class="form-group button-container">
                                <button class="btn btn-success">Guardar</button>
                                <a class="btn btn-warning" href="equipamiento.php">Volver</a>
                            </div>
                </form>
            </div>
        </div>
    </div>
    <!-- fin from -->
</body>

</html>
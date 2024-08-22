<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/images/iconoarriba.png" />
    <title>GRAMMER RH</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
          rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>
    <!-- CSS -->
    <link rel="stylesheet" href="lib/sweetalert2.css">
    <!-- JavaScript -->
    <script src="lib/sweetalert2.all.min.js"></script>

</head>
<body class="vertical  light  ">
<div class="wrapper">
    <?php
            require_once('estaticos/navegador.php');
    ?>
    <main role="main" class="main-content">

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="page-title">Selecciona Curso</h2>
                    <p class="text-muted">Bienvenido aqui podras programar y registrarte para tus cursos.</p>
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Curso</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="cbCurso">Seleccione el curso</label>
                                        <select class="custom-select" id="cbCurso" onchange="cargarHorarios()">
                                            <option selected>Abrir menu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- / .card -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->


        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <h5 class="card-title" id="tituloTabla">Curso</h5>
                            <table id="tablaEvaluacion" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nomina</th>
                                    <th>Nombre</th>
                                    <th>Fecha</th>
                                    <th>Horario</th>
                                    <th>Evaluar</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- / .card -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <h5 class="card-title" id="">Evaluados</h5>
                            <table id="tablaEvaluacionListo" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nomina</th>
                                    <th>Nombre</th>
                                    <th>Fecha</th>
                                    <th>Horario</th>
                                    <th>Evaluar</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- / .card -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->


    </main> <!-- main -->
</div> <!-- .wrapper -->

<div class="modal fade modal-right modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Subir evaluación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Nómina :<span id="txtNominaL"></span></p>
                <p>Nombre :<span id="txtNombreL"></span></p>
                <br>
                <form action="dao/subirEvaluaciones.php" method="post" enctype="multipart/form-data">

                    <input style="display: none" type="text" name="nombreUsuario" class="form-control drgpicker"
                           id="txtNombreUsuarioAux"
                           value="" aria-describedby="button-addon2">

                    <input style="display: none" type="text" name="nominaUsuario" class="form-control drgpicker"
                           id="txtNominaUsuarioAux"
                           value="" aria-describedby="button-addon2">

                    <input style="display: none" type="text" name="cursoUsuario" class="form-control drgpicker"
                           id="txtCursoUsuarioAux"
                           value="" aria-describedby="button-addon2">

                    <input style="display: none" type="text" name="idUsuario" class="form-control drgpicker"
                           id="txtIdUsuarioAux"
                           value="" aria-describedby="button-addon2">

                    <input style="display: none" type="text" name="horarioUsuario" class="form-control drgpicker"
                           id="txtHorarioUsuarioAux"
                           value="" aria-describedby="button-addon2">

                    <label for="txtCalificacionUsuarioAux"> Ingrese la calificacion del usuario</label>
                    <input style="margin-top: 5px; margin-bottom: 10px" type="number" name="calificacionUsuario" class="form-control drgpicker"
                           id="txtCalificacionUsuarioAux"
                           value="" aria-describedby="button-addon2">

                    <div class="form-group">
                        <label for="archivosNuevos">Subir documento:</label>
                        <input type="file" class="form-control-file" id="archivosNuevos" name="archivos[]" multiple>
                    </div>
                    <!-- Botón para enviar el formulario -->
                    <button type="submit" id="btnEnviarNuevos" class="btn btn-primary">Subir</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="varyModal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="varyModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Calificacion:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <table id="tablaDocumentos" class="table table-hover">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/simplebar.min.js"></script>
<script src='js/daterangepicker.js'></script>
<script src='js/jquery.stickOnScroll.js'></script>
<script src="js/tinycolor-min.js"></script>
<script src="js/config.js"></script>
<script src="js/apps.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');

    cargarCursosSelect();



    function cargarCursosSelect() {
        $.getJSON('https://arketipo.mx/RH/CursosRH/dao/consultaCursoActualesAdmin.php', function (data) {
            var select = document.getElementById("cbCurso");
            for (var i = 0; i < data.data.length; i++) {
                var createOption = document.createElement("option");
                createOption.text = data.data[i].NombreCurso + ", " + data.data[i].Fecha + ", " + data.data[i].Horario;
                createOption.value = data.data[i].NombreCurso + ", " + data.data[i].Fecha + ", " + data.data[i].Horario;
                select.appendChild(createOption);
            }

            var identificador = getParameterByName("curso");
            var identificadorDos = getParameterByName("fecha");
            var identificadorTres = getParameterByName("horario");

            if (identificador!=null && identificadorDos !=null && identificadorTres != null){
                document.getElementById("cbCurso").value = identificador+", "+identificadorDos+", "+identificadorTres;
                cargarHorarios();
            }


        });
    }

    function cargarHorarios() {
        var horarioNormal = document.getElementById("cbCurso").value;
        var horarioParts = horarioNormal.split(", ");

        var Curso = horarioParts[0].trim();
        var Fecha = horarioParts[1].trim();
        var HorarioCurso = horarioParts[2].trim();

        $.getJSON('https://arketipo.mx/RH/CursosRH/dao/consultaCursoEvaluaciones.php?curso=' + Curso + '&fecha=' + Fecha + '&horario=' + HorarioCurso, function (data) {
            var table = $("#tablaEvaluacion");
            var tableEvaluados = $("#tablaEvaluacionListo");

            table.empty();
            tableEvaluados.empty();

            document.getElementById("tituloTabla").innerHTML = data.data[0].Curso;

            for (var i = 0; i < data.data.length; i++) {

                if (data.data[i].Evaluacion == '0'){

                    var newRow = $("<tr></tr>");
                    var idACell = $("<td></td>").text(data.data[i].IdBitacoraCurso);
                    var nameCell = $("<td></td>").text(data.data[i].Nombre);
                    var nominaCell = $("<td></td>").text(data.data[i].Nomina);
                    var horarioCell = $("<td></td>").text(data.data[i].Horario); // asume que tienes un campo id en tus datos
                    var fechaCell = $("<td></td>").text(data.data[i].Fecha);
                    var valorarCell = $("<td></td>").html(`<button type="button" class="btn mb-2 btn-success text-white" onclick="evaluarCurso('${data.data[i].IdBitacoraCurso}','${data.data[i].Nombre}','${data.data[i].Nomina}','${data.data[i].Curso}')" data-toggle="modal" data-target=".modal-right">Evaluar</button>`);


                    // agrega las celdas a la fila y la fila a la tabla
                    newRow.append(idACell);
                    newRow.append(nominaCell);
                    newRow.append(nameCell);
                    newRow.append(fechaCell);
                    newRow.append(horarioCell);
                    newRow.append(valorarCell);
                    table.append(newRow);

                }else{

                    var newRowE = $("<tr></tr>");
                    var idACellE = $("<td></td>").text(data.data[i].IdBitacoraCurso);
                    var nameCellE = $("<td></td>").text(data.data[i].Nombre);
                    var nominaCellE = $("<td></td>").text(data.data[i].Nomina);
                    var horarioCellE = $("<td></td>").text(data.data[i].Evaluacion); // asume que tienes un campo id en tus datos
                    var fechaCellE = $("<td></td>").text(data.data[i].Fecha);
                    var valorarCellE = $("<td></td>").html(`<button type="button" class="btn mb-2 btn-success text-white" onclick="cargarDetalles('${data.data[i].Nomina}','${data.data[i].Nombre}','${data.data[i].Evaluacion}')" data-toggle="modal" data-target="#varyModal" data-whatever="@mdo">Ver</button>`);


                    // agrega las celdas a la fila y la fila a la tabla
                    newRowE.append(idACellE);
                    newRowE.append(nameCellE);
                    newRowE.append(nominaCellE);
                    newRowE.append(horarioCellE);
                    newRowE.append(fechaCellE);
                    newRowE.append(valorarCellE);
                    tableEvaluados.append(newRowE);

                }


            }
        });
    }

    var globalID, globalNombre, globalNomina, globalCurso;

    function evaluarCurso(IdBitacoraCurso, Nombre, Nomina, Curso) {

        globalID = IdBitacoraCurso;
        globalNombre = Nombre;
        globalNomina = Nomina;
        globalCurso = Curso;
        document.getElementById("txtNombreL").innerHTML = Nombre;
        document.getElementById("txtNominaL").innerHTML = Nomina;


        document.getElementById("txtNombreUsuarioAux").value = Nombre;
        document.getElementById("txtNominaUsuarioAux").value = Nomina;
        document.getElementById("txtCursoUsuarioAux").value = Curso;
        document.getElementById("txtIdUsuarioAux").value = IdBitacoraCurso;
        document.getElementById("txtHorarioUsuarioAux").value = document.getElementById("cbCurso").value;
    }

    function cargarDetalles(nomina,nombre,evaluacion) {
        $.getJSON('https://arketipo.mx/RH/CursosRH/dao/consultaUsuarioDocumentos.php?nomina='+nomina+'&horario='+ document.getElementById("cbCurso").value, function (data) {
            document.getElementById("recipient-name").value = evaluacion;
            document.getElementById("varyModalLabel").innerHTML = nombre;

            var table = $("#tablaDocumentos"); // selecciona la tabla
            table.empty();
            for (var i = 0; i < data.data.length; i++) {
                var newRow = $("<tr></tr>");
                var idCell = $("<td></td>").html("<a target='_blank' href='evaluaciones/"+nomina+"/"+data.data[i].NombreArchivo+"'><img src='assets/images/pdf.png'></a>");
                newRow.append(idCell);
                table.append(newRow);
            }
        });
    }



    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);


        var cadena = results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));

        var arrTerminos = cadena.split(',');

        return arrTerminos[0];
    }





</script>
</body>
</html>
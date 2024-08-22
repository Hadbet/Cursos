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
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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

    <style>
      .image-container {
        display: flex;
        justify-content: space-around;
      }
      .image-container img {
        transition: all 0.3s ease;
        width: 100px;
        height: 100px;
      }
      .image-container img:hover {
        transform: translateY(-10px);
      }
      .image-container img.active {
        transform: scale(1.2);
      }
      .image-container img.inactive {
        transform: scale(0.8);
      }
    </style>

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

        <div class="container-fluid" id="seccionTomaAsistencia">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Toma de asistencias <span id="lblCapacidad" class="badge badge-primary text-white"></span></h2>
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">Ponga su número de nómina o ponga su tarjeta sobre el escáner</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group mb-3">
                        <label for="txtNominaCurso">Nómina</label>
                        <input type="text" class="form-control" id="txtNominaCurso" value="">
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
                  <h5 class="card-title float-left">Asistencia</h5>
                  <button type="button" onclick="cerrarLista()" class="btn mb-2 btn-danger float-right text-white">Cerrar curso<span class="fe fe-x-octagon fe-16 ml-2"></span></button>
                  <table id="tablaAsistencia" class="table table-hover">
                    <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nombre Curso</th>
                      <th>Fecha</th>
                      <th>Horario</th>
                      <th>Estatus</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer">
                  <button type="button" onclick="descargarLista()" class="btn mb-2 btn-success float-right text-white">Descargar lista<span class="fe fe-chevron-right fe-16 ml-2"></span></button>
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
                  <h5 class="card-title">Faltas</h5>
                  <table id="tablaFaltas" class="table table-hover">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre Curso</th>
                      <th>Fecha</th>
                      <th>Horario</th>
                      <th>Valorar</th>
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

    <div class="modal fade modal-full" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <button aria-label="" type="button" class="close px-2" data-dismiss="modal" aria-hidden="true">
        <span aria-hidden="true">×</span>
      </button>
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body text-center">
            <h1>¿Cómo calificas el contenido del curso?</h1>
            <p>Responde y evalúa</p>
              <div class="image-container">
                  <img src="assets/images/verde.png" onclick="handleClick(this)">
                  <img src="assets/images/amarillo.png" onclick="handleClick(this)" style="margin-left: 5px;margin-right: 5px">
                  <img src="assets/images/rojo.png" onclick="handleClick(this)">
              </div>
            <br>
            <form class="form-inline justify-content-center">
              <input id="txtComentariosCurso" class="form-control form-control-lg mr-sm-2 bg-transparent" type="text" placeholder="Comentarios adicionales" aria-label="Search">

            </form>
            <br>
            <button onclick="guardarEvaluacion()" class="btn btn-primary btn-lg mb-2 my-2 my-sm-0" type="submit">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
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

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');

      cargarCursosSelect();
      function cargarCursosSelect() {
        $.getJSON('https://arketipo.mx/RH/CursosRH/dao/consultaCursoActualesAsistencia.php', function (data) {
          var select = document.getElementById("cbCurso");
          for (var i = 0; i < data.data.length; i++) {
            var createOption = document.createElement("option");
            createOption.text = data.data[i].NombreCurso +", "+ data.data[i].Fecha +", "+ data.data[i].Horario;
            createOption.value = data.data[i].NombreCurso +", "+ data.data[i].Fecha +", "+ data.data[i].Horario;
            select.appendChild(createOption);
          }
        });
      }

      function cargarCapacidad(Curso,Fecha,HorarioCurso) {
        $.getJSON('https://arketipo.mx/RH/CursosRH/dao/consultaCursoCapacidadporId.php?curso='+Curso+'&fecha='+Fecha+'&horario='+HorarioCurso, function (data) {
          var capacidad = document.getElementById("lblCapacidad");
          capacidad.innerHTML = "Lugares disponibles : "+data.data[0].CapacidadRestante;
        });
      }

      function cargarHorarios() {
        var horarioNormal = document.getElementById("cbCurso").value;
        var horarioParts = horarioNormal.split(", ");

        var Curso = horarioParts[0].trim();
        var Fecha = horarioParts[1].trim();
        var HorarioCurso = horarioParts[2].trim();

        cargarCapacidad(Curso,Fecha,HorarioCurso);


        document.getElementById("seccionTomaAsistencia").scrollIntoView({ behavior: 'smooth' });

        $.getJSON('https://arketipo.mx/RH/CursosRH/dao/consultaCursoAsistencia.php?curso='+Curso+'&fecha='+Fecha+'&horario='+HorarioCurso, function (data) {
          var table = $("#tablaAsistencia"); // selecciona la tabla
          var tableConcluidos = $("#tablaFaltas"); // selecciona la tabla

          table.empty();
          tableConcluidos.empty();

          for (var i = 0; i < data.data.length; i++) {

            if (data.data[i].EstatusAsistencia == '1'){
              var newRow = $("<tr></tr>");
              var idACell = $("<td></td>").text(data.data[i].IdBitacoraCurso);
              var nameCell = $("<td></td>").text(data.data[i].Nombre); // asume que tienes un campo id en tus datos
              var horarioCell = $("<td></td>").text(data.data[i].Horario); // asume que tienes un campo id en tus datos
              var fechaCell = $("<td></td>").text(data.data[i].Fecha);
              var valorarCell = $("<td></td>").html(`<button type="button" class="btn mb-2 btn-danger" onclick="eliminarAsistenciaCurso('${data.data[i].IdBitacoraCurso}')" >Eliminar</button>`);


              // agrega las celdas a la fila y la fila a la tabla
              newRow.append(idACell);
              newRow.append(nameCell);
              newRow.append(fechaCell);
              newRow.append(horarioCell);
              newRow.append(valorarCell);
              table.append(newRow);
            }else if(data.data[i].EstatusAsistencia == '0'){

              var newRowConcluido = $("<tr></tr>");
              var idCell = $("<td></td>").text(data.data[i].IdBitacoraCurso);
              var nameCursoCell = $("<td></td>").text(data.data[i].Nombre); // asume que tienes un campo id en tus datos
              var horarioCursoCell = $("<td></td>").text(data.data[i].Horario); // asume que tienes un campo id en tus datos
              var fechaCursoCell = $("<td></td>").text(data.data[i].Fecha); // asume que tienes un campo id en tus datos


              // agrega las celdas a la fila y la fila a la tabla
              newRowConcluido.append(idCell);
              newRowConcluido.append(nameCursoCell);
              newRowConcluido.append(horarioCursoCell);
              newRowConcluido.append(fechaCursoCell);
              tableConcluidos.append(newRowConcluido);
            }
          }
        });
      }

      $(document).ready(function() {
        $('#txtNominaCurso').keypress(function(event){
          var keycode = (event.keyCode ? event.keyCode : event.which);
          if(keycode == '13'){
            $.getJSON('https://arketipo.mx/RH/CursosRH/dao/consultaUsuario.php?nomina=' + generarNomina(document.getElementById("txtNominaCurso").value) , function (data) {
              if (data && data.data && data.data.length > 0) {
                var curso = document.getElementById("cbCurso").value;

                const dataAux = new FormData();

                dataAux.append('nomina', data.data[0].IdUser);
                dataAux.append('horario', curso);
                dataAux.append('nombre', data.data[0].NomUser);
                dataAux.append('tag', data.data[0].IdTag);

                fetch('dao/guardarAsistencia.php', {
                  method: 'POST',
                  body: dataAux
                })
                        .then(function (response) {
                          if (response.ok) {
                            let timerInterval;
                            Swal.fire({
                              icon: 'success',
                              title: "Asistencia Registrada.",
                              text: 'Gracias y mucha suerte.',
                              timer: 1800,
                              timerProgressBar: true,
                              didOpen: () => {
                                Swal.showLoading();
                                const timer = Swal.getPopup().querySelector("b");
                                timerInterval = setInterval(() => {
                                  timer.textContent = `${Swal.getTimerLeft()}`;
                                }, 100);
                              },
                              willClose: () => {
                                clearInterval(timerInterval);
                              }
                            }).then((result) => {
                              /* Read more about handling dismissals below */
                              if (result.dismiss === Swal.DismissReason.timer) {
                                console.log("I was closed by the timer");
                              }
                            });
                            document.getElementById("txtNominaCurso").value="";
                            cargarHorarios();
                          } else {
                            throw "Error en la llamada Ajax";
                          }

                        })
                        .then(function (texto) {
                          console.log(texto);
                        })
                        .catch(function (err) {
                          console.log(err);
                        });

              } else {
                cargarHorarios();
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...', showConfirmButton: false, input: 'none',
                  text: 'El correo ingresado del encargado es incorrecto no pertenece al dominio de grammer "@grammer.com"'
                })
              }
            });
          }
        });
      });

      function descargarLista() {
        var horarioNormal = document.getElementById("cbCurso").value;
        var horarioParts = horarioNormal.split(", ");

        var Curso = horarioParts[0].trim();
        var Fecha = horarioParts[1].trim();
        var HorarioCurso = horarioParts[2].trim();

        var link = "https://arketipo.mx/RH/CursosRH/pruebaPDF.php?curso="+Curso+"&horario="+HorarioCurso+"&fecha="+Fecha;

        window.open(link, '_blank');
      }


      function eliminarAsistenciaCurso(id) {

        const data = new FormData();

        data.append('id', id);

        fetch('dao/eliminarAsistenciaCurso.php', {
          method: 'POST',
          body: data
        })
                .then(function (response) {
                  if (response.ok) {
                    Swal.fire({
                      icon: 'success',
                      title: 'Removido.', showConfirmButton: false, input: 'none',
                      text: 'Se removio de manera correcta.'
                    })
                    cargarHorarios();
                  } else {
                    throw "Error en la llamada Ajax";
                  }

                })
                .then(function (texto) {
                  console.log(texto);
                })
                .catch(function (err) {
                  console.log(err);
                });
      }

      function cerrarLista() {

        var horario = document.getElementById("cbCurso");

        const data = new FormData();

        data.append('horario', horario.value);

        fetch('dao/cerrarCurso.php', {
          method: 'POST',
          body: data
        })
                .then(function (response) {
                  if (response.ok) {
                    Swal.fire({
                      icon: 'success',
                      title: 'Se cerro el curso.', showConfirmButton: false, input: 'none',
                      text: 'Puedes consultar la lista en el menu de navegación.'
                    })
                    setTimeout(function() {
                      location.reload();
                    }, 1000);
                  } else {
                    throw "Error en la llamada Ajax";
                  }

                })
                .then(function (texto) {
                  console.log(texto);
                })
                .catch(function (err) {
                  console.log(err);
                });
      }

      function generarNomina(nomina) {

        if (nomina.length === 1){return nomina = "0000000"+nomina;}
        if (nomina.length === 2){return nomina = "000000"+nomina;}
        if (nomina.length === 3){return nomina = "00000"+nomina;}
        if (nomina.length === 4){return nomina = "0000"+nomina;}
        if (nomina.length === 5){return nomina = "000"+nomina;}
        if (nomina.length === 6){return nomina = "00"+nomina;}
        if (nomina.length === 7){return nomina = "0"+nomina;}
        if (nomina.length === 8){return nomina = nomina;}
        if (nomina.length >= 9){return nomina = nomina;}

      }

    </script>
  </body>
</html>
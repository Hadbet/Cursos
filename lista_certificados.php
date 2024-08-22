<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
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
              <div class="w-50 mx-auto text-center justify-content-center py-5 my-5">
                <h2 class="page-title mb-0">¿A quien quieres buscar?</h2>
                <p class="lead text-muted mb-4">Ingresa su numero de nomina para comenzar.</p>
                <form class="searchform searchform-lg">
                  <input  id="nominaSears" class="form-control form-control-lg bg-white rounded-pill pl-5" type="search" placeholder="00000000" aria-label="Search">
                </form>
              </div>
              <div class="row my-4" id="muroBusqueda">
              </div> <!-- .row -->

            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->


      </main> <!-- main -->
    </div> <!-- .wrapper -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
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

      $(document).ready(function() {
        $('#nominaSears').keypress(function(event){
          var keycode = (event.keyCode ? event.keyCode : event.which);
          if(keycode == '13'){
            event.preventDefault(); // Esto previene el envío del formulario
            lista();
          }
        });
      });

      function lista() {
        var nomina = document.getElementById("nominaSears").value;
        var estadoCer;
        document.getElementById("muroBusqueda").innerHTML='';
        $.getJSON('https://arketipo.mx/RH/CursosRH/dao/consultaCursoUsuario.php?nomina='+nomina, function (data){
          for (var i = 0; i < data.data.length; i++) {
            if (data.data[i].EstatusAsistencia==="3"){

              if (data.data[i].Evaluacion<=5){estadoCer='fe-thumbs-down fe-32 text-danger';}
              if (data.data[i].Evaluacion>5){estadoCer='fe-thumbs-up fe-32 text-success';}

              document.getElementById("muroBusqueda").innerHTML += "<div class=\"col-6 col-lg-3\" ><div class=\"card shadow mb-4\"><div class=\"card-body\"><i class=\"fe "+estadoCer+"\"></i><a href='#' onClick=\"\generarCertificado(\'"+data.data[i].Curso+"\', \'"+data.data[i].horario+"\',\'"+data.data[i].Fecha+"\', \'"+data.data[i].IdBitacoraCurso+"\',\'"+data.data[i].Nombre+"\')\"><h3 class=\"h5 mt-4 mb-1\">"+data.data[i].Curso+"</h3></a><p class=\"text-muted\">"+data.data[i].Evaluacion+"</p></div></div></div>";
            }
          }
        });
      }


      function generarCertificado(curso, horario, fecha, id,nombre) {
        var doc = new jsPDF('landscape');

        var logo = new Image();
        logo.src = 'assets/images/plantilla.png';
        doc.addImage(logo, 'PNG', 0, 0, 298, 210);
        doc.setFillColor(173, 216, 230); // Azul claro
        doc.text(curso, 182, 123);
        doc.text(nombre, 141, 107);
        doc.text(fecha, 188, 130);
        doc.text('ID: ' + id, 13, 11);

        // Guarda el PDF
        doc.save('Certificado.pdf');
      }




    </script>
  </body>
</html>
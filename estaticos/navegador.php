<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
</nav>
<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="inicio.php">
                <img src="assets/images/Grammer_Logo.ico" style="width: 30%">
            </a>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="profile.php" class=" nav-link">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Perfil</span>
                </a>
            </li>
        </ul>
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Formularios</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#forms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-credit-card fe-16"></i>
                    <span class="ml-3 item-text">Cursos</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="forms">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="form_cursos.php"><span class="ml-1 item-text">Registro de curso</span></a>
                        <a class="nav-link pl-3" href="profile.php"><span class="ml-1 item-text">Perfil</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#tables" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-user-minus fe-16"></i>
                    <span class="ml-3 item-text">Ausentismo</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="tables">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./table_basic.php"><span class="ml-1 item-text">Registro de ausentismo</span></a>
                    </li>
                </ul>
            </li>
        </ul>
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Administración</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#contact" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-smile fe-16"></i>
                    <span class="ml-3 item-text">Cursos</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="contact">
                    <a class="nav-link pl-3" href="form_asistencia.php"><span class="ml-1">Toma de asistencia</span></a>
                    <a class="nav-link pl-3" href="form_cursos_admin_calificacion.php"><span class="ml-1">Evaluaciones</span></a>
                    <a class="nav-link pl-3" href="listas_asistencia.php"><span class="ml-1">Listas de asistencias</span></a>
                    <a class="nav-link pl-3" href="form_cursos_admin.php"><span class="ml-1">Alta de cursos</span></a>
                    <a class="nav-link pl-3" href="listas_base.php"><span class="ml-1">Base de datos</span></a>
                    <a class="nav-link pl-3" href="form_cursos_asistentes.php"><span class="ml-1">Carga manual de listas</span></a>
                    <a class="nav-link pl-3" href="lista_certificados.php"><span class="ml-1">Buscar persona</span></a>
                    <a class="nav-link pl-3" href="listas_admin.php"><span class="ml-1">Lista de certificados</span></a>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-user fe-16"></i>
                    <span class="ml-3 item-text">Ausentismos</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="profile">
                    <a class="nav-link pl-3" href="./profile.php"><span
                            class="ml-1">Lista de ausentismos</span></a>
                    <a class="nav-link pl-3" href="./profile-settings.php"><span class="ml-1">Base de datos</span></a>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#support" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-compass fe-16"></i>
                    <span class="ml-3 item-text">Capacitaciones</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="support">
                    <a class="nav-link pl-3" href="./support-center.php"><span class="ml-1">Home</span></a>
                    <a class="nav-link pl-3" href="./support-tickets.php"><span class="ml-1">Tickets</span></a>
                    <a class="nav-link pl-3" href="./support-ticket-detail.php"><span
                            class="ml-1">Ticket Detail</span></a>
                    <a class="nav-link pl-3" href="./support-faqs.php"><span class="ml-1">FAQs</span></a>
                </ul>
            </li>
        </ul>
        <div class="btn-box w-100 mt-4 mb-1">
            <a href="index.html"
               target="_blank" class="btn mb-2 btn-danger btn-lg btn-block">
                <i class="fe fe-log-out fe-12 mx-2 text-white"></i><span class="small text-white">Salir</span>
            </a>
        </div>
    </nav>
</aside>
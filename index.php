<?php
$protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
define("BASEURL", $protocol.$_SERVER["HTTP_HOST"]."/facturacion/");
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">

    <title>Facturación electronica</title>

    <link href="<?php echo BASEURL; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <link href="<?php echo BASEURL; ?>css/sb-admin-2.min.css" rel="stylesheet">
        <link href="<?php echo BASEURL; ?>css/style.css" rel="stylesheet">
        <link href="<?php echo BASEURL; ?>css/editor.bootstrap4.min.css" rel="stylesheet">
        <link href="<?php echo BASEURL; ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/treeview/jquery.treeview.css" type="text/css"/>
</head>

<body id="page-top">

    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion d-none" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo BASEURL; ?>inicio">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Facturación<sup>L&H</sup></div>
            </a>

            <hr class="sidebar-divider my-0">

            <div class="menupage" id="menupage"></div>

            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow d-none">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav navbar-nav-menu ml-auto display-none" style="display: none">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small name-profile"></span>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo BASEURL; ?>img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?php echo BASEURL; ?>mi-perfil/">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a> -->
                                <a class="dropdown-item" href="<?php echo BASEURL; ?>cambiar-contrasena/">
                                    <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cambiar contraseña gg
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <div class="container-fluid"> </div>

            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>© FacturaciónL&H - Todos los derechos reservados <?php echo date("Y"); ?></span>
                    </div>
                </div>
            </footer>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Realmente deseas cerrar la sessón?</h5>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                    <a type="button" class="btn btn-primary" onclick="cerrarSesion()">Si</a>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo BASEURL; ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo BASEURL; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASEURL; ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/sb-admin-2.min.js"></script>
    <script src="<?php echo BASEURL; ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo BASEURL; ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/script.js"></script>
    <script src="<?php echo BASEURL; ?>js/jquery/jquery.treeview.min.js"></script>


</body>

</html>

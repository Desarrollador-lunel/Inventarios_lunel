<?php include 'head.php';
      session_start();
      $idUsuario = $_SESSION['id_usuario'];



?>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-icon">
                        <i class="fas fa-laptop">
                        </i>
                    </div>
                    <div class="sidebar-brand-text mx-3">
                        Inventory
                        <sup>
                            Software
                        </sup>
                    </div>
                </a>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">
                            <i class="fas fa-home">
                            </i>
                            <span>
                                Inicio
                            </span>
                        </a>
                    </li>
                    <!-- Divider -->
                    <hr class="sidebar-divider">
                        <!-- Heading -->
                        <div class="sidebar-heading">
                            Menú
                        </div>
                        <!-- Nav Item - Charts -->
                        <li class="nav-item">
                            <a class="nav-link" id="menu_equipos">
                                <i class="fas fa-desktop">
                                </i>
                                <span>
                                    Equipos
                                </span>
                            </a>
                        </li>
                        <!-- Nav Item - Charts -->
                        <li class="nav-item">
                            <a class="nav-link" href="charts.html">
                                <i class="fas fa-file-contract">
                                </i>
                                <span>
                                    Proyectos
                                </span>
                            </a>
                        </li>
                        <!-- Nav Item - Pages Collapse Menu -->
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="fas fa-user-check">
                                </i>
                                <span>
                                    Asignación
                                </span>
                            </a>
                        </li>
                        <!-- Nav Item - Charts -->
                        <li class="nav-item">
                            <a class="nav-link" href="charts.html">
                                <i class="fas fa-exchange-alt">
                                </i>
                                <span>
                                    Devolución
                                </span>
                            </a>
                        </li>
                        <!-- Nav Item - Charts -->
                        <li class="nav-item">
                            <a class="nav-link" href="charts.html">
                                <i class="fas fa-chart-bar">
                                </i>
                                <span>
                                    Informes
                                </span>
                            </a>
                        </li>
                        <!-- Nav Item - Utilities Collapse Menu -->
                        <li class="nav-item">
                            <a aria-controls="collapseUtilities" aria-expanded="true" class="nav-link collapsed" data-target="#collapseUtilities" data-toggle="collapse" href="#">
                                <i class="fas fa-cog">
                                </i>
                                <span>
                                    Administración
                                </span>
                            </a>
                            <div aria-labelledby="headingUtilities" class="collapse" data-parent="#accordionSidebar" id="collapseUtilities">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <h6 class="collapse-header">
                                        Personal:
                                    </h6>
                                    <a class="collapse-item" href="utilities-color.html">
                                        Empleado
                                    </a>
                                    <a class="collapse-item" href="utilities-animation.html">
                                        Funcionario
                                    </a>
                                </div>
                            </div>
                        </li>
                        <!-- Sidebar Toggler (Sidebar) -->
                        <div class="text-center d-none d-md-inline">
                            <button class="rounded-circle border-0" id="sidebarToggle">
                            </button>
                        </div>
                    </hr>
                </hr>
            </ul>
            <!-- End of Sidebar -->
            <!-- Content Wrapper -->
            <div class="d-flex flex-column" id="content-wrapper">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <!-- Sidebar Toggle (Topbar) -->
                        <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop">
                            <i class="fa fa-bars">
                            </i>
                        </button>
                        <!-- Topbar Search -->

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->

                            <!-- Nav Item - Alerts -->

                            <!-- Nav Item - Messages -->

                            <div class="topbar-divider d-none d-sm-block">
                            </div>
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="userDropdown" role="button">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                        <?php echo $idUsuario; ?>
                                    </span>
                                    <img class="img-profile rounded-circle" src="https://cdn.icon-icons.com/icons2/1248/PNG/128/user_84308.png">
                                    </img>
                                </a>
                                <!-- Dropdown - User Information -->
                                <div aria-labelledby="userDropdown" class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                                    <a class="dropdown-item" id="menu_usuarios">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400">
                                        </i>
                                        Usuario
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400">
                                        </i>
                                        Roles
                                    </a>
                                    <div class="dropdown-divider">
                                    </div>
                                    <a class="dropdown-item" data-target="#logoutModal" data-toggle="modal" href="#">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400">
                                        </i>
                                        Salir
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- End of Topbar -->
                    <!-- Begin Page Content -->
                    <div id="tabla" class="panel-default" style="margin: 20px;"></div>
                    <div class="container-fluid">

                    <!-- /.container-fluid -->
                </div>

                <!-- End of Main Content -->
                <!-- Footer -->

                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up">
            </i>
        </a>
        <!-- Logout Modal-->
        <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="logoutModal" role="dialog" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Ready to Leave?
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Select "Logout" below if you are ready to end your current session.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">
                            Cancel
                        </button>
                        <a class="btn btn-primary" href="login.html">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
  <?php include 'footer.php';?>


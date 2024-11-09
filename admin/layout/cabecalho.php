<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= APP_NAME; ?></title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="<?= APP_URL; ?>/public/css/fontsgoogleapis.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= APP_URL; ?>/public/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= APP_URL; ?>/public/dist/css/adminlte.min.css">
    <!-- Sweetalert2 -->
    <script src="<?= APP_URL; ?>/public/js/sweetalert2@11.js"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= APP_URL; ?>/public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= APP_URL; ?>/public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= APP_URL; ?>/public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- jQuery -->
    <script src="<?= APP_URL; ?>/public/plugins/jquery/jquery.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= APP_URL; ?>/admin/" class="nav-link">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;"><b><?= APP_NAME_LOCAL; ?></b></font>
                        </font>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- LATERAL ESQUERDA -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- INSTITUIÇÃO -->
            <a href="<?= APP_URL; ?>/admin/" class="brand-link">
                <img src="<?= APP_URL; ?>/public/img/mpla.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"> <strong><?= APP_NAME; ?> <strong></span>
            </a>
            <!-- FUNÇÃO -->
            <a href="<?= APP_URL; ?>" class="brand-link text-left" style="display: block;">
                <span class="brand-text font-weight-light text-lg">
                    <i class="fas fa-user"></i>
                    <b>Usuário: </b>
                    <span class="text-warning"><b><?= $nome; ?></b></span>
                </span>
                <br>
                <span class="brand-text font-weight-light text-lg">
                    <i class="fas fa-lock"></i>
                    <b>Nível: </b>
                    <span class="text-warning"><b><?= $nivel; ?></b></span>
                </span>
            </a>
            <!-- FIM FUNÇÃO -->
            <div class="sidebar">
                <!-- MENU -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- USUÁRIO -->
                        <li class="nav-item">
                            <a href="<?= APP_URL; ?>/admin/usuarios" class="nav-link active bg-warning text-white">
                                <i class="nav-icon fas fa-users"></i>
                                <p><strong>Usuários</strong></p>
                            </a>
                        </li>
                        <!-- COMITES -->
                        <li class="nav-item">
                            <a href="<?= APP_URL; ?>/admin/comites" class="nav-link active bg-warning text-white">
                                <i class="nav-icon fas fa-sitemap"></i>
                                <p><strong>Comites</strong></p>
                            </a>
                        </li>
                        <!-- FUNCÕES -->
                        <li class="nav-item">
                            <a href="<?= APP_URL; ?>/admin/funcoes" class="nav-link active bg-warning text-white">
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p><strong>Funções</strong></p>
                            </a>
                        </li>
                      
                        

                        <!-- SECTORES -->
                        <li class="nav-item">
                            <a href="<?= APP_URL; ?>/admin/cas" class="nav-link active bg-warning text-white">
                                <i class="nav-icon fas fa-project-diagram"></i>
                                <p><strong>Sectores</strong></p>
                            </a>
                        </li>
                        <!-- CAP -->
                        <li class="nav-item">
                            <a href="<?= APP_URL; ?>/admin/cap" class="nav-link active bg-warning text-white">
                                <i class="nav-icon fas fa-layer-group"></i>
                                <p><strong>CAPs</strong></p>
                            </a>
                        </li>
                        <!-- MILITANTES -->
                        <li class="nav-item">
                            <a href="<?= APP_URL; ?>/admin/militantes" class="nav-link active bg-warning text-white">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p> <strong>Militantes</strong></p>
                            </a>
                        </li>
                        <!-- TERMINAR SESSÃO -->
                        <li class="nav-item">
                            <a href="<?= APP_URL; ?>/app/controllers/login/terminar_sessao.php" class="nav-link" style="background-color: crimson; color: white;" onclick="confirmarSaida(); return false;">
                                <i class="nav-icon fas fa-sign-out-alt" style="color: white;"></i>
                                <p><strong>Terminar Sessão</strong></p>
                            </a>
                        </li>
                        <script>
                            function confirmarSaida() {
                                Swal.fire({
                                    title: 'Tem certeza?',
                                    text: "Você realmente deseja terminar a sessão?",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#d33',
                                    cancelButtonColor: '#3085d6',
                                    confirmButtonText: 'Sim',
                                    cancelButtonText: 'Cancelar'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '<?= APP_URL; ?>/app/controllers/login/terminar_sessao.php'; // Redireciona para o logout
                                    }
                                });
                            }
                        </script>
                        <!-- FIM TERMINAR SESSÃO -->
                    </ul>
                </nav>
            </div>
            <!-- MENU -->
        </aside>
        <!-- FIM LATERAL ESQUERDA -->
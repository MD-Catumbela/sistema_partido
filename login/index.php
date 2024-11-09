<?php
include('../app/config.php');
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= APP_NAME; ?></title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= APP_URL; ?>/public/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= APP_URL; ?>/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?= APP_URL; ?>/public/css/adminlte.min.css">
    <script src="<?= APP_URL; ?>/public/js/sweetalert2@11.js"></script>
    <style>
        body {
            background-image: url('<?= APP_URL; ?>/public/img/bandeira_mpla.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
        }
    </style>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <?php
        session_start();
        if ((isset($_SESSION['mensagem'])) && (isset($_SESSION['icone']))) {
            $resposta = $_SESSION['mensagem'];
            $icone = $_SESSION['icone']; ?>
            <script>
                Swal.fire({
                    position: "top-center",
                    icon: "<?= $icone; ?>",
                    title: "<?= $resposta; ?>",
                    showConfirmButton: false,
                    timer: 4500
                });
            </script>
        <?php
            unset($_SESSION['mensagem']);
        }
        ?>
        <div class="card card-outline card-orange shadow ">
            <div class="card-header text-center">
                <br>
                <a href="" class="h1"><b><?= APP_NAME; ?></b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Faça login para iniciar sua sessão</p>
                <form action="<?= APP_URL; ?>/app/controllers/login/logar.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Usuário">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password_user" class="form-control" placeholder="Senha">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-block" style="background-color: #FF8C00; color: white;">Entrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="<?= APP_URL; ?>/public/plugins/jquery/jquery.min.js"></script>
    <script src="<?= APP_URL; ?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= APP_URL; ?>/public/js/adminlte.min.js"></script>
</body>
</html>
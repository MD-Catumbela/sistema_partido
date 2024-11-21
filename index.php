<?php
include('app/config.php');
include('admin/layout/sessao.php');
//redirecionar o usuario para a pagina de Menu
header("Location: " . APP_URL . "/admin");
exit();
?>
<?php
include('app/config.php');
include('admin/layout/sessao.php');

// Redireciona para a página do admin
header("Location: " . APP_URL . "/admin");
exit(); // Termina a execução do script após o redirecionamento
?>

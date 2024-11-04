<?php
include('../../config.php');

session_start();
if (isset($_SESSION['session_username'])) {
    session_destroy();
    $_SESSION['mensagem'] = "Sessão Encerrada";
    $_SESSION['icone'] = "info";
    header('Location:' . APP_URL . '/');
}

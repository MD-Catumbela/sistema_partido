<?php
//VARIAVEIS GLOBAIS//
define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('PASSWORD', '');
define('BD', 'bd_mpla');
define('APP_NAME', 'Gestão MPLA');
define('APP_NAME_LOCAL', '');
define('APP_URL', 'http://localhost/www.partido.com');
define('APP_SITE', 'https://md-catumbela.netlify.app');

$servidor = "mysql:dbname=" . BD . ";host=" . SERVIDOR;
try {
    $pdo = new PDO($servidor,  USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch (PDOException $e) {
    echo "Erro ao conectar com o banco de dados";
}

date_default_timezone_set("Africa/Luanda");
$data_hora = date('Y-m-d H:i:s');
$data_actual = date('Y-m-d');
$dia_actual = date('d');
$mes_actual = date('m');
$ano_actual = date('Y');
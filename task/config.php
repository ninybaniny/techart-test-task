<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'D:\xampp\htdocs\k2');

define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define("CONTROLLER_PATH", ROOT . "/controller/");
define("MODEL_PATH", ROOT . "/model/");
define("VIEW_PATH", ROOT . "/view/");

$dbinfo = [ 
'host' => 'localhost',
'user' => 'root',
'password' => '',
'dbname' => 'news',
];

$db;

try {
    // инициализация pdo
    $pdo = new PDO('mysql:host=' . $dbinfo['host'] . ';dbname=' . $dbinfo['dbname'], $dbinfo['user'], $dbinfo['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // в случае ошибки подкл к бд
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
<?php
require_once 'config.php';
require_once '..\task\app\controller\news_controller.php';

$newsController = new NewsController($pdo);


if (isset($_GET['action']) && $_GET['action'] === 'view' && isset($_GET['id'])) {
    $newsController->detailAction($_GET['id']);
} else {
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $newsController->listAction($page);
} 


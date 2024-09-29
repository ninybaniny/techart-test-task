<?php
require_once '..\task\app\model\news_model.php';

class NewsController {
    private $model;

    public function __construct($pdo) {
        $this->model = new NewsModel($pdo);
    }

    // вывод списка новостей
    public function listAction($page) {
        $limit = 4;
        $offset = ($page - 1) * $limit;
        $news = $this->model->getNews($offset, $limit);
        $latestNews = $this->model->getLatestNews();
        $totalNews = $this->model->getNewsCount();
        $totalPages = ceil($totalNews / $limit);

        include '..\task\app\view\news\news_list.php';
    }

    // вывод отдельной (полной) новости
    public function detailAction($id) {
        $newsItem = $this->model->getNewsById($id);
        include '..\task\app\view\news\news_details.php';
    }
}
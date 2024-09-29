<?php
class NewsModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    // получ. новости для указанной стр.
    public function getNews($offset, $limit) {
        try {
        $sql = "SELECT * FROM news ORDER BY date DESC LIMIT :offset, :limit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Ошибка при выполнении запроса: " . $e->getMessage();
        return [];
    } 
}

    // получ. послед. новости
    public function getLatestNews() {
        $sql = "SELECT * FROM news ORDER BY date DESC LIMIT 1";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // поиск новости по id
    public function getNewsById($id) {
        $sql = "SELECT * FROM news WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // общее кол-во новостей
    public function getNewsCount() {
        $sql = "SELECT COUNT(*) AS count FROM news";
        return $this->pdo->query($sql)->fetchColumn();
    }
}

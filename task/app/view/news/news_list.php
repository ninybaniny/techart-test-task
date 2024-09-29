<?php include '..\task\app\view\general\header.php'; ?>

<!-- блок с последней новостью -->
<div class="banner" style="background-image: url('/public/images/<?= $latestNews['image']; ?>');">
    <div class="ban-text">
        <h1><?= $latestNews['title']; ?></h1>
        <p><?= $latestNews['announce']; ?></p>
    </div>
</div>

<!-- список новостей -->
<div class="news-block">
<h1> Новости </h1>
    <div class="news-list">
         <?php foreach ($news as $item): ?>
            <a href="?action=view&id=<?= $item['id']; ?>" class="news-item-link">
                <div class="news-item">
                    <span><?= date('d.m.Y', strtotime($item['date'])); ?></span>
                    <h2><?= $item['title']; ?></h2>
                    <p><?= $item['announce']; ?></p>
                    <button class="buttonforward"> Подробнее </button>
                </div>
            </a>
        <?php endforeach; ?>
    </div>

    <!-- пагинация -->
    <div class="pagination">
        
    <?php if ($page > 1): ?>
        <a href="?page=<?= $page - 1; ?>" class="prev"><!-- назад --></a>
    <?php endif; ?>

    <?php
    // первые 3 стр
    if ($page <= 2):
        for ($i = 1; $i <= min(3, $totalPages); $i++): ?>
            <a href="?page=<?= $i; ?>" class="<?= ($i == $page) ? 'active' : ''; ?>"><?= $i; ?></a>
        <?php endfor;

    // показ предыдущей, текущей и следующей стр (нач с 3 стр.)
    else:
        for ($i = max(1, $page - 1); $i <= min($page + 1, $totalPages); $i++): ?>
            <a href="?page=<?= $i; ?>" class="<?= ($i == $page) ? 'active' : ''; ?>"><?= $i; ?></a>
        <?php endfor;
    endif;
    ?>

    <?php if ($page < $totalPages): ?>
        <a href="?page=<?= $page + 1; ?>" class="next"><!-- вперед --></a>
    <?php endif; ?>

    </div>
</div>

<?php include '..\task\app\view\general\footer.php'; ?>
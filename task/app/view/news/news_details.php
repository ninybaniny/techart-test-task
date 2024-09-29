<?php include '../task/app/view/general/header.php'; ?>

<hr class="hr">
<div class="news-d-block">
    <div class="news-detail">

        <!-- навигация -->
        <nav class="navigating">
            <a href="index.php">Главная</a>
            <span class="span1"> / </span>
            <a href="news.php?id=<?= $newsItem['id']; ?>"><?= $newsItem['title']; ?></a>
        </nav>

        <!-- детальная новость -->
        <h1><?= $newsItem['title']; ?></h1>
        <span class="span2"><?= date('d.m.Y', strtotime($newsItem['date'])); ?></span>

        <div class="main-content">
            <div class="main-text">
                <div class="headline"> 
                    <h2><?= $newsItem['announce']; ?></h2> 
                </div>
                <div class="context"> 
                    <p><?= $newsItem['content']; ?></p> 
                </div>
                <!-- <div class="buttonback">  -->
                    <a href="index.php"> 
                        <button class="buttonback"> Назад к новостям </button> 
                    </a>
                <!-- </div> -->
            </div>
            <div class="main-pic">
                <img src="/public/images/<?= $newsItem['image']; ?>" alt="<?= $newsItem['title']; ?>">
            </div>
        </div>

    </div>
</div>

<?php include '../task/app/view/general/footer.php'; ?>